<?php
namespace App\DatabaseModels;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

abstract class BaseDatabase{
    public const AVAILABLE_SYNTAX = ['mysql', 'postgre', 'mssql'];
    protected $connectionName;
    public abstract function checkSyntax($query);

    public function select($query, $task, $request) {

        try {
            DB::connection($this->connectionName)->beginTransaction();
            $result = DB::connection($this->connectionName)->select($query);
            DB::connection($this->connectionName)->rollBack();
            return $result;
        } catch (\Exception $exception) {
            $this->throwExceptionWithInput($exception);
        }
    }

    public function update($query, $task, $request) {
        try {
            DB::connection($this->connectionName)->beginTransaction();
            DB::connection($this->connectionName)->update($query);
            $selectQuery = $this->getSelectForDatabase($request, $task);
            $result = DB::connection($this->connectionName)->select($selectQuery);
            DB::connection($this->connectionName)->rollBack();
            return $result;
        } catch (\Exception $exception) {
            $this->throwExceptionWithInput($exception);
        }
    }

    public function delete($query, $task, $request) {
        try {
            DB::connection($this->connectionName)->beginTransaction();
            DB::connection($this->connectionName)->delete($query);
            $selectQuery = $this->getSelectForDatabase($request, $task);
            $result = DB::connection($this->connectionName)->select($selectQuery);
            DB::connection($this->connectionName)->rollBack();
            return $result;
        } catch (\Exception $exception) {
            $this->throwExceptionWithInput($exception);
        }
    }

    public function throwExceptionWithInput($exception) {
        request()->flash();
        throw ValidationException::withMessages([
            'solution' => $exception->getMessage(),
        ]);
    }

    public function getSelectForDatabase($request, Task $task) {
        if($request->syntax == 'mysql') {
            return $task->getMySqlSelect();
        } else if($request->syntax == 'postgre') {
            return $task->getPostgreSelect();
        } else {
            return $task->getMsSqlSelect();
        }
    }
}
