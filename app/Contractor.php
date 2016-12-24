<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $table="tbl_contractor_company";
    protected $primaryKey="contractor_id";
    protected $fillable=['contractor_id','contractor_name','contractor_mobile','contractor_num','contractor_address','contractor_image','contractor_manager','contractor_start_date',
    'contractor_end_date','contractor_scope'];

    public function activity()
    {
        return $this->belongsTo('App\Activity','contractor_id');
    }
}
