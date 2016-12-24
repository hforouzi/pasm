<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=['menu_name','menu_slug','menu_order'];
    protected $table="tbl_menu";
    protected $primaryKey="menu_id";
}
