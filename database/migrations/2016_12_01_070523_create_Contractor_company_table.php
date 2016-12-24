<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_contractor_company', function (Blueprint $table) {

            $table->increments('contractor_id')->unsigned();
            $table->string('contractor_name',100);
            $table->string('contractor_mobile',11);
            $table->string('contractor_num',16);
            $table->string('contractor_address',255);
            $table->string('contractor_image',100);
            $table->string('contractor_manager',120);
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
        Schema::drop('tbl_contractor_company');
    }
}
