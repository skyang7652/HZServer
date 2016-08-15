<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryadvanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaryadvace', function (Blueprint $table) {
            $table->increments('SA_Id');
            $table->integer('employee_Id');
            $table->integer('money');
            $table->date('date');
            $table->string('remark');
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
        Schema::drop('salaryadvace');
    }
}
