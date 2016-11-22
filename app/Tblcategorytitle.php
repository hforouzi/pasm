<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblcategorytitle extends Model
{
    protected $fillable =['category_title'];
    protected $table='tbl_category_titles';
    protected $primaryKey="category_title_id";
    public function tblcategory()
    {
        return $this->hasMany('App\tblcategory');
    }
}
