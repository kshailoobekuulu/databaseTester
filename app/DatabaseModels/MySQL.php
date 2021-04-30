<?php
namespace App\DatabaseModels;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MySQL extends BaseDatabase{

    public function __construct() {
        $this->connectionName = config('database.mysqlTest');
    }

    public function checkSyntax($query) {
        DB::connection($this->connectionName)->statement('explain '. $query);
    }
}
