<?php
namespace App\DatabaseModels;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

abstract class BaseDatabase{
    public const AVAILABLE_SYNTAX = ['mysql', 'postgre', 'mssql'];
    protected $connectionName;
    public abstract function checkSyntax($query);

    public function select($query) {

        try {
            DB::connection($this->connectionName)->beginTransaction();
            $result = DB::connection($this->connectionName)->select($query);
            DB::connection($this->connectionName)->rollBack();
            return $result;
        } catch (\Exception $exception) {
            $this->throwExceptionWithInput($exception);
        }
    }

    public function update($query) {
        try {
            DB::connection($this->connectionName)->beginTransaction();
            $result = DB::connection($this->connectionName)->update($query);
            DB::connection($this->connectionName)->rollBack();
            return $result;
        } catch (\Exception $exception) {
            $this->throwExceptionWithInput($exception);
        }
    }

    public function delete($query) {
        try {
            DB::connection($this->connectionName)->beginTransaction();
            $result = DB::connection($this->connectionName)->delete($query);
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
}
