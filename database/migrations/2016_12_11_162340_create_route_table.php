<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_routes', function (Blueprint $table) {
            $table->increments('route_id');
            $table->string('route_path',120);
            $table->string('route_name',120);
            $table->string('route_method',120);
            $table->string('route_action',120);
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
        Schema::drop('tbl_routes');
    }
}
