<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_contractor_Activities', function (Blueprint $table) {
            $table->integer('activity_score');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onupdate('cascade');
            $table->foreign('contractor_id')->references('contractor_id')->on('tbl_contractor_company')->onDelete('cascade')->onupdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_Activits_contractor', function (Blueprint $table) {
            //
        });
    }
}
