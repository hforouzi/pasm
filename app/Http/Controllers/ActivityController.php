<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Contractor;
use App\Executive;
use Carbon\Carbon;
use Illuminate\Cache\RedisStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use League\Flysystem\File;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\Facades\jDate;

class ActivityController extends Controller
{
    protected $calculator=array();
    public function index()
    {
        return $this->show();
    }

    public function create()
    {
        return view('activity.add_activity');

    }

    public function show_executive_table( Request $request)
    {
        if ($request->ajax())
        {
            $data=Input::except('_token');
            $val= $this->create_table($data['scope']);

            echo $val;
        }
        else{
            abort(500, 'Unauthorized action.');
        }
    }
    public function show_month(Request $request)
    {
        $data=($request->all());
        $date=explode("-",(jDate::forge()->format('date')));
        $out='<label>  ماه</label><select  class="form-control" name="activity_month" id="activity_month">';
        $out.='<option value="">انتخاب نمایید</option>';

        if($data['year']==1395)
        {
            for ($i=9;$i<=$date[1];$i++)
            {
                $out.='<option value="'.$i.'">'.$this->month_name($i).'</option>';

            }

        }
        elseif ($data['year']>1395)
        {
            for ($i=1;$i<=$date[1];$i++)
            {
                $out.='<option value="'.$i.'">'.$this->month_name($i).'</option>';

            }
        }
        $out.='</select>';
        echo $out;
    }
    private function month_name($num)
    {
        switch ($num)
        {
            case 1:
                return "فروردین";
                break;
            case 2:
                return "اردیبهشت";
                break;
            case 3:
                return "خرداد";
                break;
            case 4:
                return "تیر";
                break;
            case 5:
                return "مرداد";
                break;
            case 6:
                return "شهریور";
                break;
            case 7:
                return "مهر";
                break;
            case 8:
                return "آبان";
                break;

            case 9:
                return "آذر";
                break;

            case 10:
                return "دی";
                break;

            case 11:
                return "بهمن";
                break;

            case 12:
                return "اسفند";
                break;
        }
    }
    private function scope_name($num)
    {
        switch ($num)
        {
            case 1:
                return "منطقه یک";
                break;
            case 2:
                return "منطقه دو";
                break;
            case 3:
                return "منطقه سه";
                break;
            case 4:
                return "منطقه چهار";
                break;
            case 5:
                return "منطقه پنج";
                break;
            case 6:
                return "منطقه ویژه";
                break;

        }
    }
    public function store(Request $request)
    {
        $contractor=(Contractor::where("contractor_scope","=",$request["activity_scope"])->where("contractor_active","=",1)->firstOrFail());
        $data["activity_year"]=($request["activity_year"]);
        $data["activity_month"]=($request["activity_month"]);
        $data["contractor_id"]=$contractor["contractor_id"];
        $data["user_id"]=Auth::user()->id;
        $plan=Input::except("_token","activity_year","activity_month","activity_scope");
        foreach ($plan as $key=>$value) {
            $data["plan_id"]=$key;
            $data["activity_score"]=$value;
            Activity::create($data);
        }
        return redirect('activity/show')->with('message','با موفقیت ثبت شد');
    }
    public function show()
    {
        // DB::enableQueryLog();
        $data=(Activity::join("tbl_contractor_company","tbl_contractor_company.contractor_id","=","tbl_contractor_activities.contractor_id")
            ->groupBy("activity_year","activity_month","contractor_scope")
            ->orderBy("activity_year","activity_month")
            ->paginate(12));
        /* $i=0;
         foreach ($data as $item)
         {
             $list_activity[$i]['activity_id']=($item->activity_id);
             $list_activity[$i]['contractor_name']=($item->contractor[0]->contractor_name);
             $list_activity[$i]['activity_month']=($this->month_name($item->activity_month));
             $list_activity[$i]['activity_year']=($item->activity_year);
             $list_activity[$i]['contractor_scope']=$this->scope_name(($item->contractor[0]->contractor_scope));
             $i++;
         }*/
        return view("activity.list_activity",compact("data"));
    }

    public function activity_calculator($year,$month,$scope)
    {
        $data=(Activity::get_activity_last($year,$month,$scope));
        $this->calculatro_program($data);
        $send_data["year"]=$year;
        $send_data["month"]=$month;
        $send_data["scope"]=$scope;
        $send_data["table"]=($this->create_table($scope,"disabled"));
        $send_data["total"]=($this->calculator);
        return view('activity.calculator_view',compact("send_data"));
    }
    private function calculatro_program($data)
    {
        $this->calculator[1]=0;
        $this->calculator[2]=0;
        $this->calculator[3]=0;
        $this->calculator[4]=0;
        $this->calculator[5]=0;
        foreach ($data as $item) {
            if($item->category_title==5)
            {
                $multi=1*$item->plan_price_base*$item->activity_score;
            }
            else
            {
                $multi=$this->cal_executive_program($item->plan_program)*$item->plan_price_base*$item->activity_score;
            }
            /*   echo $this->cal_executive_program($item["plan_program"])."*".$item["plan_price_base"]."*".$item["activity_score"];
               echo "---->";

               echo $item["category_title"]."-".$this->cal_executive_program($item["plan_program"])."-".$item["plan_id"]."--";
               var_dump($multi);
               echo "<br>";*/

            $this->calculator[$item->category_title]+=$multi;
        }

    }
    private function cal_executive_program($program)
    {
        switch ($program)
        {
            case "روزانه":
                $how_count=30.5;
                break;
            case "روزانه مستمر":
                $how_count=30.5;
                break;
            case "همیشه تمیز و ماهانه یک بار":
                $how_count=1;
                break;
            case "همیشه تمیز و ماهانه دوبار":
                $how_count=2;
                break;
            case "همیشه تمیز و ماهانه چهاربار":
                $how_count=4;
                break;
            case "حسب نیاز کارفرما":
                $how_count=0;
                break;
        }
        return $how_count;
    }
    private function create_table($scope,$disable=null)
    {
        $executive = new Executive();
        $data = $executive->get_data($scope);
        $out = collect(json_decode(json_encode($data), true));
        $count = $out->groupBy('category_title_id');

        $val = "<div id='table_scope' class=\"col-md-12\">
            <table class=\"table table-striped table-bordered table-hover\" id=\"sample-table-2\">
                            <thead>
                            <tr class='info'>
                            <th colspan='4'>ضریب مینوس </th>
                            <th colspan='4'>".number_format($data[0]->plan_minus,2)."</th>
</tr>
                <tr>
                    <th class=\"center\">ردیف</th>
                    <th>عنوان</th>
                    <th class=\"hidden-xs\">نوع فعالیت</th>
                    <th class=\"hidden-xs\">واحد اندازه گیری</th>
                    <th class=\"hidden-xs\">برنامه اجرایی</th>
                    <th class=\"hidden-xs\">قیمت پایه</th>
                    <th class=\"hidden-xs\">حجم عملیات</th>
                    <th class=\"hidden-xs\">فعالیت انجام شده</th>
                </tr>
                </thead>
                <tbody>";
        foreach ( $count as $item) {
            $i = 1;
            foreach ($item as $row) {

                $val .= "<tr>";
                if ($i == 1) {
                    $val .= "<td rowspan='" . count($item) . "' class=\"center\">" . $row['category_title_id'] . "</td>
                             <td rowspan='" . count($item) . "'>" . $row['category_title'] . "</td>";
                }

                $val .= "<td class=\"hidden-xs\">" . $row['category_type'] . "</td>
                          <td class=\"hidden-xs\">" . $row['category_measure_title'] . "</td>
                          <td class=\"hidden-xs\">
                          <div class=\"form-group\">
                               <span class=\"symbol required\" aria-required=\"true\"></span>
                                    <input disabled placeholder=\"برنامه اجرایی را وارد نمایید\" class=\"form-control\" id=\"firstname\" name=\"plan_program_" . ($row['id'] - 3) . "\" type=\"text\" value='" . $row['plan_program'] . "'>
                                </div>
                            </td>
                            <td class=\"hidden-xs\">
                                <div class=\"form-group\">
                                    <span class=\"symbol required\" aria-required=\"true\"></span>
                                     <input disabled placeholder=\"ثیمت پایه را وارد نمایید\" class=\"form-control\" id=\"firstname\" name=\"plan_price_base_" . ($row['id'] - 3) . "\" type=\"text\" value='" . $row['plan_price_base'] . "'>

                                </div>
                            </td>
                            <td class=\"hidden-xs\">
                                <div class=\"form-group\">
                                    <span class=\"symbol required\" aria-required=\"true\"></span>
                                    <input disabled placeholder=\"حجم کاری را وارد نمایید\" class=\"form-control\" id=\"firstname\" name=\"plan_total_" . ($row['id'] - 3) . "\" type=\"text\" value='" . $row['plan_total'] . "'>

                                </div>
                            </td>
                            <td class=\"hidden-xs\">
                                <div class=\"form-group\">
                                    <span class=\"symbol required\" aria-required=\"true\"></span>
                                    <input ".$disable." placeholder=\"حجم کاری را وارد نمایید\" class=\"form-control\" id=\"firstname\" name=\"" . ($row['plan_id'] ) . "\" type=\"text\" value='" . $row['plan_total'] . "'>

                                </div>
                            </td>
                        </tr>";
                $i++;
            }
        }
        $val .= "</tbody>
           </table>
                              </div>
                       ";
        return $val;
    }

    public function output_excell($year,$month,$scope)
    {
        $fine_sum=$this->activity_fine($year,$month,$scope);

        $get_db=(Activity::get_activity_last($year,$month,$scope));
        $data=collect(json_decode(json_encode($get_db)))->sortBy("plan_id");
        return Excel::load(public_path('excell\soorathesab.xlsx'),function ($excel) use ($data,$fine_sum) {

            $excel->sheet('A', function($sheet) use($data){
                $i=7;
                $this->calculatro_program($data);

                foreach ($data as $item) {
                    $sheet->cell('E'.$i, function($cells) use($item) {
                        $cells->setFontSize(10);
                        $cells->setValue($this->cal_executive_program($item->plan_program));
                    });
                    $sheet->cell('F'.$i, function($cells) use($item) {
                        $cells->setFontSize(10);
                        $cells->setValue($item->plan_price_base);
                    });
                  /*  $sheet->cell('G'.$i, function($cells) use($item) {
                        $cells->setFontSize(10);
                        $cells->setValue($item->plan_total);
                    });*/
                    $sheet->cell('G'.$i, function($cells) use($item) {
                        $cells->setFontSize(10);
                        $cells->setValue($item->activity_score);
                    });
                    $i++;
                }
             /*   $sheet->cell('E26', function($cells) use($item) {
                    $cells->setFontSize(11);
                    $cells->setValue(number_format($this->calculator[1],2,".",","));
                });
                $sheet->cell('E27', function($cells) use($item) {
                    $cells->setFontSize(11);
                    $cells->setValue($this->calculator[3]+$this->calculator[4]);
                });
                $sheet->cell('E28', function($cells) use($item) {
                    $cells->setFontSize(11);
                    $cells->setValue($this->calculator[5]);
                });

                $sheet->cell('E29', function($cells) use($item) {
                    $cells->setFontSize(11);
                    $cells->setValue($this->calculator[1]+$this->calculator[5]+$this->calculator[3]+$this->calculator[4]);
                });*/
                $sheet->cell('C2', function($cells) use($item) {

                    $cells->setFontSize(11);
                    $cells->setValue($item->contractor_name);
                });
                $sheet->cell('C3', function($cells) use($item) {
                    //   dd($item);
                    $cells->setFontSize(11);
                    $cells->setValue(jDate::forge(intval($item->contractor_start_date))->format('date'));
                });
                $sheet->cell('C4', function($cells) use($item) {
                    $cells->setFontSize(11);
                    $cells->setValue(jDate::forge('now')->format('date'));
                });
                $sheet->cell('F3', function($cells) use($item) {
                    $cells->setFontSize(11);
                    $cells->setValue($item->contractor_number_contract);
                });
                $sheet->cell('F4', function($cells) use($item) {
                    $cells->setFontSize(11);
                    $cells->setValue(number_format($item->plan_minus,2,"/",","));
                });
            });
            foreach ($fine_sum as $key=>$val)
            {
                $fine_type=substr($key,0,3);
                if($fine_type==100)
                {
                    $excel->sheet('B', function($sheet) use($fine_sum,$key){
                        $row=array_sum(str_split(substr($key,3)))+2;

                        $sheet->cell('D'.$row, function($cells) use($fine_sum,$key) {
                            $cells->setFontSize(11);
                            $cells->setValue(number_format($fine_sum[$key]));
                        });
                    });
                }
                elseif($fine_type==200)
                {
                    $excel->sheet('C', function($sheet) use($fine_sum,$key){
                        $row=array_sum(str_split(substr($key,3)))+2;

                        $sheet->cell('D'.$row, function($cells) use($fine_sum,$key) {
                            $cells->setFontSize(11);
                            $cells->setValue(number_format($fine_sum[$key]));
                        });
                    });
                }
                elseif($fine_type==300)
                {
                    $excel->sheet('D', function($sheet) use($fine_sum,$key){
                        $row=array_sum(str_split(substr($key,3)))+2;

                        $sheet->cell('D'.$row, function($cells) use($fine_sum,$key) {
                            $cells->setFontSize(11);
                            $cells->setValue(number_format($fine_sum[$key]));
                        });
                    });
                }
                elseif($fine_type==400)
                {
                    $excel->sheet('E', function($sheet) use($fine_sum,$key){
                        $row=array_sum(str_split(substr($key,3)))+2;

                        $sheet->cell('D'.$row, function($cells) use($fine_sum,$key) {
                            $cells->setFontSize(11);
                            $cells->setValue(number_format($fine_sum[$key]));
                        });
                    });
                }
                elseif($fine_type==500)
                {
                    $excel->sheet('F', function($sheet) use($fine_sum,$key){
                        $row=array_sum(str_split(substr($key,3)))+2;

                        $sheet->cell('D'.$row, function($cells) use($fine_sum,$key) {
                            $cells->setFontSize(11);
                            $cells->setValue(number_format($fine_sum[$key]));
                        });
                    });
                }
            }



            $date = jDate::forge('now')->format('datetime');

            $excel->setFileName($date."soorathesab");
        })->download("xlsx");
    }

    public function activity_fine($year, $month, $scope)
    {

        $str=$year."-0".$month."-"."01";
        $str_end=$year."-0".$month."-".$this->month_days($month);
        $start_date=(\Morilog\Jalali\jDatetime::createCarbonFromFormat('Y-m-d',$str)->timestamp);
        $end_date=(\Morilog\Jalali\jDatetime::createCarbonFromFormat('Y-m-d',$str_end)->timestamp);
        $fine=((Activity::get_month_day_fine($start_date,$end_date,$scope)));
$fine_sum=array();
        foreach ($fine as $value)
        {
            isset($fine_sum[$value->fine_number])?$fine_sum[$value->fine_number]+=$value->fine_value:$fine_sum[$value->fine_number]=$value->fine_value;
        }

return ($fine_sum);
    }

    private function month_days($month)
    {
        if($month>=1 && $month<=6)
        {
            $day=31;
        }
        else
        {
            $day=30;
        }
        return $day;
    }
}
