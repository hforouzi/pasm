<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Executive extends Model
{
    protected $fillable = ['category_id','plan_program','plan_price_base','plan_total','plan_year','plan_of_month','plan_to_month','plan_scope','plan_active'];
    protected $table="tbl_executive_plan";
    public function tblcategory()
    {
        return $this->belongsTo('App\tblcategory','category_id');
    }

    public function Activity()
    {
        return $this->belongsTo('App\Activity','plan_id');
    }

    public function get_data($id)
    {
        $data=DB::table('tbl_categories')
            ->select('*','tbl_categories.category_id as id ')
            ->leftjoin('tbl_executive_plan','tbl_categories.category_id','=','tbl_executive_plan.category_id')
            ->leftjoin('tbl_category_titles','tbl_category_titles.category_title_id','=','tbl_categories.category_title')
            ->leftjoin('tbl_category_measures','tbl_category_measures.category_measure_id','=','tbl_categories.category_measure')
            ->where('plan_active','=',1)
            ->where('plan_scope','=',$id)
          //  ->where('plan_of_month','>=',$month)
           // ->where('plan_to_month','=<',$month)
            ->get();
        if(count($data)==0)
        {
            $data1=DB::table('tbl_categories')
                ->select('*','tbl_categories.category_id as id ')
                ->leftjoin('tbl_executive_plan','tbl_categories.category_id','=','tbl_executive_plan.category_id')
                ->leftjoin('tbl_category_titles','tbl_category_titles.category_title_id','=','tbl_categories.category_title')
                ->leftjoin('tbl_category_measures','tbl_category_measures.category_measure_id','=','tbl_categories.category_measure')
                ->whereNull('plan_active')
                ->get();
            return $data1;
        }
        else
        {
            return $data;

        }

    }
    public function insert_to_executive_plan($data)
    {

        $edit=DB::table('tbl_executive_plan')
            ->where('plan_scope','=',(int)$data['plan_scope'])
            ->where('category_id','=',(int)$data['category_id'])
            ->where('plan_active','=',1)

            ->update(['plan_active' =>DB::raw(0),'plan_to_month'=>$data['plan_of_month'],'plan_to_year'=>$data['plan_year']]);

        DB::table('tbl_executive_plan')
            ->insert($data);

    }
}
