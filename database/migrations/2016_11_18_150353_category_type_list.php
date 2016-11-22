<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryTypeList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category', function (Blueprint $table) {
            $table->increments('category_id');
            $table->enum('category_title',['pasmand','barf','nezafat','clear','niroo']);
            $table->string('category_type');
            $table->enum('category_measure',['kiloo','tool','metrmoraba','tedad','service'])->change();
            $table->timestamps();

        });
        Schema::create('tbl_executive_plan', function (Blueprint $table) {
            $table->increments('plan_id')->unsigned();
            $table->string('plan_program');
            $table->integer('plan_price_base')->unsigned();
            $table->integer('plan_total')->unsigned();
            $table->string('plan_year',10);
            $table->string('plan_of_month',10);
            $table->string('plan_to_month',10);
            $table->timestamps();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('tbl_category')->onDelete('cascade');

        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_executive_plan');
        Schema::drop('tbl_category');

    }
}
