<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controctor extends Model
{
    protected $table="tbl_contractor_company";
    protected $primaryKey="contractor_id";
    protected $fillable=['contractor_id','contractor_name','contractor_mobile','contractor_num','contractor_address','contractor_image','contractor_manager'];

    public function tblcontractoractivity()
    {
        return $this->belongsTo('App\Activity','')
    }
}
