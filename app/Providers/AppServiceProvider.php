<?php

namespace App\Providers;

use App\DatabaseModels\MsSQL;
use App\DatabaseModels\MySQL;
use App\DatabaseModels\PostgreSQL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mysql_solution', function (){
            return new MySQL();
        });
        $this->app->bind('postgre_solution', function (){
            return new PostgreSQL();
        });
        $this->app->bind('mssql_solution', function (){
            return new MsSQL();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
