<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailPay', function (Blueprint $table) {
            $table->increments('detailPay_Id');
            $table->integer('pay_Id');
            $table->integer('timeSegment');
            $table->integer('time');
            $table->integer('bid_Id');
            $table->integer('money');
            $table->softDeletes();
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
        Schema::drop('detailPay');
    }
}
