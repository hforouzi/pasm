<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['person_name', 'person_family', 'person_codemeli'];
    protected $table="tbl_person";
    protected $primaryKey="person_id";

    public function user()
    {
        return $this->belongsTo('App\User','person_id');
    }
}
