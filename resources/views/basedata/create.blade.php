@extends('layouts.main')
<link href="/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
<link href="/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
<link href="/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<link href="/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
@section('content')
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">ثبت انواع فعالیت ها</h1>
                        <span class="mainDescription">در این قسمت انواع فعالیت های قابل ارزیابی برای پیمانکاران طبق قرارداد پیمان ثبت میشود.</span>
                    </div>
                </div>
            </section>
            <!-- end: PAGE TITLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <h2>انواع فعالیت ها</h2>
                               <hr>
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
                                    <label for="form-field-select-2">
                                        عنوان
                                    </label>
                                    {!! Form::select('category_title',App\Tblcategorytitle::pluck('category_title','category_title_id'),null,['class'=>'cs-select cs-skin-elastic']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="form-field-select-2">واحد اندازه گیری                                    </label>
                                    {!! Form::select('category_measure',App\tblcategorymeasure::pluck('category_measure_title','category_measure_id'),null,['class'=>'cs-select cs-skin-elastic']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        نوع فعالیت <span class="symbol required" aria-required="true"></span>
                                    </label>
                                    <input placeholder="نوع فعالیت را وارد نمایید" class="form-control" id="category_type" name="category_type" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-success btn-wide pull-right" type="submit">
                                 ثبت نوع فعالیت <i class="fa fa-floppy-o"></i>
                            </button>
                        </div>
                    </div>
               <!-- </form>-->

                {!! Form::close() !!}

            </div>
        </div>
            <div class="container-fluid container-fullw">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">Edit <span class="text-bold">Rows</span></h5>
                        <div class="row">
                            <div class="col-md-12 space20">
                                <button class="btn btn-green add-row">
                                    Add New <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="sample_2">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Peter Clark</td>
                                    <td>UI Designer</td>
                                    <td>(641)-734-4763</td>
                                    <td>
                                        <a href="#" class="edit-row">
                                            Edit
                                        </a></td>
                                    <td>
                                        <a href="#" class="delete-row">
                                            Delete
                                        </a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="/vendor/DataTables/jquery.dataTables.min.js"></script>
    <script src="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/assets/js/form-elements.js"></script>
@include('basedata/data-table')
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
            TableData.init();
        });
    </script>
@endsection
