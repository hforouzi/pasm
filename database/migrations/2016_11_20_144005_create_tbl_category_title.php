<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCategoryTitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_title', function (Blueprint $table) {
            $table->increments('category_title_id')->unsigned();
            $table->string('category_title',50);
            $table->timestamps();
        });
        Schema::table('tbl_category',function (Blueprint $table){
            $table->foreign('category_title')->references('category_title_id')->on('tbl_category_title')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_category_title', function (Blueprint $table) {
            //
        });
    }
}
