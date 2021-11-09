<?php


namespace App\DatabaseModels;


use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MsSQL implements BaseDatabase
{
    protected $connectionName;
    public function __construct()
    {
        $this->connectionName = config('database.mssqlTest');
    }

    public function checkSyntax($query)
    {
        DB::connection($this->connectionName)->statement('SET FMTONLY  ON; '. $query);
    }

    public function select($query)
    {
        try {
            DB::connection($this->connectionName)->beginTransaction();
            $result = DB::connection($this->connectionName)->select($query);
            DB::connection($this->connectionName)->rollBack();
            return $result;
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([
                'solution' => $exception->getMessage(),
            ]);
        }
    }
}
