<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSellerForeignKeyToBillOfSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_of_sales', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id')->after('billPhotoPath');
            $table->foreign('seller_id')->references('id')->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_of_sales', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
        });
    }
}
