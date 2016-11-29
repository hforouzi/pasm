@extends('layouts.main')
@section('content')
    <div class="main-content" >
        <div class="wrap-content container" id="container">

            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <h2>ویرایش نوع فعالیت</h2>
                        <hr>
    {!! Form::model($category,['route'=>['basedata.update',$category->category_id],'method'=>'PATCH']) !!}
    @include('basedata.form')

    {!! Form::close() !!}
</div>
    </div>
    @endsection