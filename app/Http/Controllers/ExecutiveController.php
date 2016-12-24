<?php

namespace App\Http\Controllers;

use App\Executive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ExecutiveController extends Controller
{

    private $attributes=array(
        'category_title'=>'عنوان' ,
        'category_measure'=>'واحد اندازه گیری' ,
        'category_type'=>'نوع فعالیت' ,
    );
    public function index()
    {


        return view('basedata.executive_index');

    }

    public function show_executive_table( Request $request)
    {
        if ($request->ajax())
        {
            $data=Input::except('_token');
            $executive = new Executive();
            $data = $executive->get_data($data['scope']);
            $out = collect(json_decode(json_encode($data), true));
            $count = $out->groupBy('category_title_id');
            $val = "<div id='table_scope' class=\"col-md-12\">
            <table class=\"table table-striped table-bordered table-hover\" id=\"sample-table-2\">
                            <thead>
                <tr>
                    <th class=\"center\">ردیف</th>
                    <th>عنوان</th>
                    <th class=\"hidden-xs\">نوع فعالیت</th>
                    <th class=\"hidden-xs\">واحد اندازه گیری</th>
                    <th class=\"hidden-xs\">برنامه اجرایی</th>
                    <th class=\"hidden-xs\">قیمت پایه</th>
                    <th class=\"hidden-xs\">حجم عملیات</th>
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
                                    <input placeholder=\"برنامه اجرایی را وارد نمایید\" class=\"form-control\" id=\"firstname\" name=\"plan_program_" . ($row['id'] - 3) . "\" type=\"text\" value='" . $row['plan_program'] . "'>
                                </div>
                            </td>
                            <td class=\"hidden-xs\">
                                <div class=\"form-group\">
                                    <span class=\"symbol required\" aria-required=\"true\"></span>
                                     <input placeholder=\"ثیمت پایه را وارد نمایید\" class=\"form-control\" id=\"firstname\" name=\"plan_price_base_" . ($row['id'] - 3) . "\" type=\"text\" value='" . $row['plan_price_base'] . "'>

                                </div>
                            </td>
                            <td class=\"hidden-xs\">
                                <div class=\"form-group\">
                                    <span class=\"symbol required\" aria-required=\"true\"></span>
                                    <input placeholder=\"حجم کاری را وارد نمایید\" class=\"form-control\" id=\"firstname\" name=\"plan_total_" . ($row['id'] - 3) . "\" type=\"text\" value='" . $row['plan_total'] . "'>

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
            echo $val;
        }
        else{
            abort(500, 'Unauthorized action.');
        }
    }

    public function getdata(Request $request)
    {
        $executive=new Executive();

        $rules=['contractor_scope'=>'required','date'=>'required'];
        for ($i=1;$i<=19;$i++)
        {
            $rules= array_add($rules,'plan_program_'.$i,['required','regex:/^[پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژؤإأءًٌٍَُِّ\s]+$/u']);
            $rules= array_add($rules,'plan_price_base_'.$i,['required']);
            $rules= array_add($rules,'plan_total_'.$i,['required']);

        }
        $this->validate($request,$rules,['required'=> ' :attribute وارد نمایید.'],$this->attributes);

        // dd(\Morilog\Jalali\jDatetime::createCarbonFromFormat('Y/m/d',$data['date'])->timestamp);
        $scope=$request['contractor_scope'];
        $minus=$request['minus'];

        $year=substr($request['date'],0,4);
        $month=substr($request['date'],5,2);

        $data=Input::except("_token","contractor_scope","minus","date");
        foreach ($data as $index => $item) {

            $insertData[substr(strrchr($index, "_"), 1)+3]['plan_scope']=(int)$scope;
            $insertData[substr(strrchr($index, "_"), 1)+3]['plan_minus']=(float)$minus;
            $insertData[substr(strrchr($index, "_"), 1)+3]['plan_year']=$year;
            $insertData[substr(strrchr($index, "_"), 1)+3]['plan_of_month']=$month;
            $insertData[substr(strrchr($index, "_"), 1)+3]['plan_active']=1;
            $insertData[substr(strrchr($index, "_"), 1)+3]['category_id']=substr(strrchr($index, "_"), 1)+3;
            if(substr($index, 0, strrpos($index, '_'))=="plan_program")
                $insertData[substr(strrchr($index, "_"), 1)+3]['plan_program']=$item;
            if(substr($index, 0, strrpos($index, '_'))=="plan_price_base")
                $insertData[substr(strrchr($index, "_"), 1)+3]['plan_price_base']=$item;
            if(substr($index, 0, strrpos($index, '_'))=="plan_total")
                $insertData[substr(strrchr($index, "_"), 1)+3]['plan_total']=$item;

        }
        foreach ($insertData as $item) {
            $executive->insert_to_executive_plan($item);

        }
        return redirect('executive')->with('message','با موفقیت ثبت شد');
    }
}
