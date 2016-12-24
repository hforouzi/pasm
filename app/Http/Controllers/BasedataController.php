<?php

namespace App\Http\Controllers;

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

    public function index()
    {


        $category=Tblcategory::with(['tblcategorytitle','tblcategorymeasure'])->paginate(10);

        return view('basedata.index',compact('category'));

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
        Tblcategory::create($data);
        return redirect('basedata')->with('message','با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $category=Tblcategory::with(['tblcategorytitle','tblcategorymeasure'])->findOrFail($id);
        //$this->authorize('modify',$category);
        return view('basedata.edit',compact('category'));
    }

    public function update($id,Request $request)
    {
        $contact=Tblcategory::findOrFail($id);

        $this->validate($request, $this->rules);


        $contact->update($request->all());

        return redirect('basedata')->with('message','با موفقیت ویرایش شد.');
    }
}
