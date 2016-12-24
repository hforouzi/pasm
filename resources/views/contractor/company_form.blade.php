<link type="text/css" href="/vendor/jquery-ui/flick/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
<link href="/assets/css/jasny-bootstrap.min.css" rel="stylesheet">

{!! Form::open(['route'=>'contractor.store','files'=>true]) !!}

<div class="row">
    <div class="col-md-7">
        <fieldset>
            <legend>
                مشخصات پیمانکار
            </legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            نام شرکت <span class="symbol required"></span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            {!! Form::text('contractor_name',null,array('placeholder' => "نام شرکت را وارد نمایید",'class' => 'form-control'))!!}
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">
                            شماره ثبت شرکت<span class="symbol required"></span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-id-card"></i></span>
                            {!! Form::text('contractor_num',null,array('placeholder' => "شماره ثبت شرکت را وارد نمایید",'class' => 'form-control'))!!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            نام و نام خانوادگی مدیر <span class="symbol required"></span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::text('contractor_manager',null,array('placeholder' => "نام و نام خانوادگی مدیر را وارد نمایید ",'class' => 'form-control'))!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">
                            شماره تماس <span class="symbol required"></span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
                            {!! Form::text('contractor_mobile',null,array('placeholder' => "شماره تماس مدیر را وارد نمایید.",'class' => 'form-control'))!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">
                            آدرس شرکت
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-map-marker"></i> </span>
                            {!! Form::text('contractor_address',null,array('placeholder' => "آدرس شرکت را وارد نمایید",'class' => 'form-control'))!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">تاریخ شروع</label>
                        <div class="input-group">
                            {!! Form::text('contractor_start_date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'تاریخ شروع را انتخاب نمایید', 'id' => 'contractor_start_date')) !!}
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-calendar"></i>
                                </button> </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">
                            تاریخ پایان                                </label>
                        <div class="input-group">
                            {!! Form::text('contractor_end_date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'تاریخ شروع را انتخاب نمایید', 'id' => 'contractor_end_date')) !!}
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>
                            منطقه فعالیت
                        </label>
                        @include('layouts.partial.scope_combo')
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>                            شماره قرارداد                                </label>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-sort-numeric-asc"></i>
                            </span>

                            <input class="form-control" placeholder="شماره قرارداد را وارد نمایید" name="contractor_number_contract" id="contractor_number_contract">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-5">
        <fieldset>
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class=" thumbnail">
                    <img src="/assets/images/default-user.png" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"></div>
                <div class="text-right">
                        <span class="btn btn-default btn-file"><span class="fileinput-new">انتخاب عکس</span>
                            <span class="fileinput-exists">تغییر</span>{!! Form::file('contractor_image') !!}</span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">پاک کردن</a>

                </div>
            </div>
        </fieldset>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-wide pull-right">
            ثبت <i class="fa fa-save"></i>
        </button>
    </div>
</div>
{!! Form::close() !!}
<script src="/assets/js/jasny-bootstrap.min.js"></script>

<script src="/vendor/jquery.ui.datepicker1.8.14-cc/scripts/jquery-1.6.2.min.js"></script>
<script src="/vendor/jquery.ui.datepicker1.8.14-cc/scripts/jquery.ui.datepicker-cc.all.min.js"></script>

<script src="/vendor/selectFx/classie.js"></script>
<script src="/vendor/selectFx/selectFx.js"></script>
<script>jQuery.noConflict();</script>

<script>
    jQuery("#contractor_start_date").datepicker({
        dateFormat: 'yy/mm/dd',
        autoSize: true
    });
    jQuery("#contractor_end_date").datepicker({
        dateFormat: 'yy/mm/dd',
        autoSize: true
    });
</script>