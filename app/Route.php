<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable=['route_path','route_name','route_method','route_action','route_controller'];
    protected $table="tbl_routes";
    protected $primaryKey="route_id";
}
