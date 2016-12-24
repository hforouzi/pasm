<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditContractorCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_contractor_company', function (Blueprint $table) {
            $table->char('contractor_start_date',10);
            $table->char('contractor_end_date',10);
            $table->enum('contractor_scope',[1,2,3,4,5,]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_contractor_company', function (Blueprint $table) {
            //
        });
    }
}
