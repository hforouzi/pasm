<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCategoryMeasure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_measure', function (Blueprint $table) {
                $table->increments('category_measure_id')->unsigned();
                $table->string('category_measure_title',50);
                $table->timestamps();
            });
            Schema::table('tbl_category',function (Blueprint $table){
                $table->foreign('category_measure')->references('category_measure_id')->on('tbl_category_measure')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_category_measure', function (Blueprint $table) {
            //
        });
    }
}
