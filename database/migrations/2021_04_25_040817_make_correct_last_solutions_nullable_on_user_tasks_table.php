<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCorrectLastSolutionsNullableOnUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_tasks', function (Blueprint $table) {
           $table->text('last_solution')->nullable(true)->change();
           $table->text('correct_solution')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_tasks', function (Blueprint $table)  {
           $table->text('last_solution')->nullable(false)->change();
           $table->text('correct_solution')->nullable('false')->change();
        });
    }
}
