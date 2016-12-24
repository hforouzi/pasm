@extends('layouts.main')
@section('content')
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>ویرایش نوع فعالیت</h2>
                <hr>
                {!! Form::model($company,['route'=>['contractor.update',$company->category_id],'method'=>'PATCH']) !!}
                @include('contractor.company_form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection