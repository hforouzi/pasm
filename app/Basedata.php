<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Basedata extends Model
{
    function Scopetbl_category($data){
        return DB::table('tbl_category')->insert($data);
    }
    function get_data_tbl_category()
    {
        return DB::table('tbl_category')->paginate(10);


    }
}
