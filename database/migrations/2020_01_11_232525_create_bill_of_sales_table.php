<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillOfSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_of_sales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('billNumber');
            $table->string('OnlineAcessCode');
            $table->double('totalValue');
            $table->string('billPDFPath')->nullable();
            $table->string('billPhotoPath')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_of_sales');
    }
}
