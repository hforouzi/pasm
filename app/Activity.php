<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    protected $table="tbl_contractor_activities";
    protected $primaryKey='activity_id';
    protected $fillable=['activity_id','plan_id','activity_year','activity_month','contractor_id','activity_score','user_id'];

    public function Contractor()
    {
        return $this->hasMany('App\Contractor','contractor_id');
    }

    public function user()
    {
        return $this->hasMany('App\user','id');
    }

    public function Executive()
    {
        return $this->hasMany('App\Executive','plan_id');
    }
    static public function get_activity_last($year,$month,$scope,$order="default")
    {
        return DB::table('tbl_contractor_activities')
            ->join("tbl_contractor_company","tbl_contractor_company.contractor_id","=","tbl_contractor_activities.contractor_id")
            ->join("tbl_executive_plan","tbl_contractor_activities.plan_id","=","tbl_executive_plan.plan_id")
            ->join("tbl_categories","tbl_categories.category_id","=","tbl_executive_plan.category_id")
            ->where("activity_year","=",$year)
            ->where("activity_month","=",$month)
            ->where("contractor_scope","=",$scope)
            ->orderBy("activity_year","activity_month")
            ->orderBy("tbl_contractor_activities.created_at","desc")
            ->take(19)
            ->get();
    }
    static  function get_month_day_fine($start_date,$end_date,$scope)
    {
        return DB::table("tbl_fine")
            ->join('tbl_fine_title','tbl_fine.fine_number','=','tbl_fine_title.fine_number')
            ->where('tbl_fine.fine_timestamp','>=',$start_date)
            ->where('tbl_fine.fine_timestamp','<=',$end_date)
            ->where('fine_zone',"=",$scope)
            ->groupBy('fine_timestamp')
            ->get();
    }
}
