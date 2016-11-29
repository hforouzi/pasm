<link href="/vendor/select2/select2.min.css" rel="stylesheet" media="screen">

        {!! Form::open(['route'=>'basedata.store','files'=>true]) !!}
        <!--  <form action="" role="form" id="form" novalidate="novalidate">-->
            <div class="row">
                <div class="col-md-12">
                    @if(count($errors))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_title">
                            عنوان
                        </label>
                        {!! Form::select('category_title',App\Tblcategorytitle::pluck('category_title','category_title_id'),null,['class'=>'cs-select cs-skin-elastic']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_measure">واحد اندازه گیری                                    </label>
                        {!! Form::select('category_measure',App\tblcategorymeasure::pluck('category_measure_title','category_measure_id'),null,['class'=>'cs-select cs-skin-elastic']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            نوع فعالیت <span class="symbol required" aria-required="true"></span>
                        </label>
                        {!! Form::text('category_type',null,array('placeholder' => "نوع فعالیت را وارد نمایید",'class' => 'form-control'))!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-success btn-wide pull-right" type="submit">
                  ذخیره <i class="fa fa-floppy-o"></i>
                </button>
            </div>
        </div>
        <!-- </form>-->

        {!! Form::close() !!}

    </div>
</div>
<script src="/vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="/vendor/autosize/autosize.min.js"></script>
<script src="/vendor/selectFx/classie.js"></script>
<script src="/vendor/selectFx/selectFx.js"></script>

<script type="text/javascript" src="/vendor/select2/select2.min.js"></script>
<script type="text/javascript" src="/vendor/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="/vendor/jquery-blockui/jquery.blockUI.js"></script>
<script type="text/javascript" src="/vendor/jquery-mockjax/jquery.mockjax.min.js"></script>
<script src="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

<script src="/assets/js/form-elements.js"></script>
<script>
    jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
    });
</script>