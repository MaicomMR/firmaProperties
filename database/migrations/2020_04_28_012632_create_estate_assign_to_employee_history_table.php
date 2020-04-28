<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateAssignToEmployeeHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('estate_id');

            $table->tinyInteger('assign')->nullable();
            $table->tinyInteger('unassign')->nullable();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('estate_id')->references('id')->on('estates');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estate_history', function (Blueprint $table) {
            $table->dropForeign(['employee_id'], ['estate_id']);
        });
    }
}
