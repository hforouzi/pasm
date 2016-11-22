<?php

namespace App\Http\Controllers;

use App\Tbl_category;
use App\Tblcategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BasedataController extends Controller
{

    private    $rules=[
        'category_title'=>['required'],
        'category_measure'=>['required'],
        'category_type'=>['required','min:5'],
    ];
    private $attributes=array(
    'category_title'=>'عنوان' ,
    'category_measure'=>'واحد اندازه گیری' ,
    'category_type'=>'نوع فعالیت' ,
        );

    public function setAttributeNames(array $attributes)
    {
        $this->customAttributes = $attributes;

        return $this;
    }
    public function create()
    {
       $category=Tblcategory::with(['tblcategorytitle','tblcategorymeasure'])->paginate(10);
        return view('basedata.create',compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->rules,['required'=> ' :attribute وارد نمایید.'],$this->attributes);

        $data=Input::except('_token');
        tbl_category::create($data);
        return redirect('basedata/create')->with('message','با موفقیت ثبت شد');
    }
}
