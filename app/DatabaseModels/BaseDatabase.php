<?php
namespace App\DatabaseModels;

interface BaseDatabase{
    public function checkSyntax($query);
    public function select($query);
}
