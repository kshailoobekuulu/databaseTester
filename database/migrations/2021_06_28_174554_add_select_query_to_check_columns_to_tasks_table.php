<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelectQueryToCheckColumnsToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('mysql_select_query')->nullable();
            $table->text('postgre_select_query')->nullable();
            $table->text('mssql_select_query')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('mysql_select_query');
            $table->dropColumn('postgre_select_query');
            $table->dropColumn('mssql_select_query');
        });
    }
}
