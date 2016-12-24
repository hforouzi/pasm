<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerosn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person', function (Blueprint $table) {
            $table->increments('person_id')->unsigned();
            $table->string('person_name',125);
            $table->string('person_family',125);
            $table->string('person_fathername',125);
            $table->enum('person_gender',['zan','mard']);
            $table->char('person_codemeli',10);
            $table->char('person_mobile',11);
            $table->string('person_address');
            $table->string('person_image');
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
        Schema::drop('tbl_person');
    }
}
