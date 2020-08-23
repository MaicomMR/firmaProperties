<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminConfigValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_config_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('write_off_value_alert')->default(0);
            $table->double('day_write_off_value_alert')->default(0);
            $table->double('month_write_off_value_alert')->default(0);
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
        Schema::dropIfExists('admin_config_values');
    }
}
