<?php


namespace App\DatabaseModels;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PostgreSQL extends BaseDatabase
{
    public function __construct() {
        $this->connectionName = config('database.postgreTest');
    }

    public function checkSyntax($query) {
        DB::connection($this->connectionName)->statement('explain ' . $query);
    }
}
