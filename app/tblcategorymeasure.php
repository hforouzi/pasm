<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblcategorymeasure extends Model
{
    protected $fillable =['category_measure_id','category_measure_title'];
    protected $primaryKey="category_measure_id";
    protected $table='tbl_category_measures';
    public function tblcategory()
    {
        return $this->hasMany('App\tblcategory');
    }
}
