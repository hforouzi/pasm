<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblcategory extends Model
{
    protected $fillable = ['category_title', 'category_measure', 'category_type', 'created_at', 'updated_at'];
    protected $table="tbl_categories";
    protected $primaryKey="category_id";

    public function tblcategorytitle()
    {
        return $this->belongsTo('App\Tblcategorytitle','category_title');
    }
    public function tblcategorymeasure()
    {
        return $this->belongsTo('App\Tblcategorymeasure','category_measure');
    }

}
