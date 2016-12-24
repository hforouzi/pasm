<?php

namespace App\Http\Controllers;

use App\Contractor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ContractorController extends Controller
{
    private    $rules=[
        'contractor_name'=>['required','min:5'],
        'contractor_num'=>['required'],
        'contractor_manager'=>['required','min:5'],
        'contractor_scope'=>['required'],
        'contractor_mobile'=>['required'],
        'contractor_start_date'=>['required'],
        'contractor_end_date'=>['required'],
    ];
    private $attributes=array(
        'contractor_name'=>"نام شرکت",
        'contractor_num'=>"شماره شرکت",
        'contractor_manager'=>"نام و نام خانوادگی مدیر",
        'contractor_scope'=>"منطقه فعالیت",
        'contractor_mobile'=>"شماره همراه مدیر",
        'contractor_start_date'=>"تاریخ شروع",
        'contractor_end_date'=>"تاریخ پایان",
    );
    private $upload_dir='uploads/images';

    public function index()
    {
        $company=Contractor::paginate(10);
        return view('contractor.list_contractor',compact('company'));
    }

    public function create()
    {
        return view('contractor.add_contractor');
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->rules,['required'=> ' :attribute وارد نمایید.'],$this->attributes);
        $data=$request->all();
        if($request->hasFile('contractor_image'))
        {
            $photo= $request->file('contractor_image');
            $filename="company_".$photo->getClientOriginalName();

            $destination=$this->upload_dir;
            $photo->move($destination,$filename);
            $data['contractor_image']=$filename;
        }

        $data['contractor_start_date']=(\Morilog\Jalali\jDatetime::createCarbonFromFormat('Y/m/d',$data['contractor_start_date'])->timestamp);
        $data['contractor_end_date']=(\Morilog\Jalali\jDatetime::createCarbonFromFormat('Y/m/d',$data['contractor_end_date'])->timestamp);
        \DB::enableQueryLog();
        Contractor::create($data);
        return redirect('contractor')->with('message',"با موفقیت ثبت شد");
    }

    public function edit($id)
    {
        $company=Contractor::findOrFail($id);
        //$this->authorize('modify',$category);
        return view('contractor.edit_contractor',compact('company'));
    }

    public function update()
    {

    }
}
