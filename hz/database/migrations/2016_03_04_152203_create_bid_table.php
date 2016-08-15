<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid', function (Blueprint $table) {
            $table->increments('bid_Id');
            $table->string('bidName');
            $table->string('bidAbbreviation');
            $table->Integer('bidMoney');
            $table->Integer('bidBond');
            $table->Date('startDate');
            $table->Date('endDate');
            $table->boolean('bidType');
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
        Schema::drop('bid');
    }
}
