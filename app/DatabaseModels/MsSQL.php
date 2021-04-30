<?php


namespace App\DatabaseModels;


use Illuminate\Support\Facades\DB;

class MsSQL extends BaseDatabase
{
    public function __construct() {
        $this->connectionName = config('database.mssqlTest');
    }

    public function checkSyntax($query) {
        DB::connection($this->connectionName)->statement('SET FMTONLY  ON; '. $query);
    }
}
