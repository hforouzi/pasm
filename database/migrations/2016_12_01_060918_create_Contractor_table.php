<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_contractor_Activities', function (Blueprint $table) {
            $table->increments('activity_id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->string('activity_year',10);
            $table->string('activity_month',10);
            $table->integer('contractor_id')->unsigned();
            $table->foreign('plan_id')->references('plan_id')->on('tbl_executive_plan')->onDelete('cascade')->onupdate('cascade');
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
        Schema::drop('tbl_contractor_Activities');
    }
}
