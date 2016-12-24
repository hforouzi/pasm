@extends('layouts.main')
<link href="/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
<link href="/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
<link href="/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<link href="/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
@section('content')
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="mainTitle"> انواع فعالیت ها</h1>
                <span class="mainDescription">در این قسمت انواع فعالیت های قابل ارزیابی برای پیمانکاران طبق قرارداد پیمان ثبت میشود.</span>
            </div>
        </div>
    </section>
    <!-- end: PAGE TITLE -->

    <div class="container-fluid container-fullw">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <a class="btn btn-wide btn-primary" href="{{route("basedata.create")}}"><i class="ti-plus"></i> اضافه کردن</a>
                </p>
                <table class="table table-striped table-hover" id="sample-table-2">
                    <thead>
                    <tr>
                        <th class="center">ردیف</th>
                        <th>عنوان</th>
                        <th class="hidden-xs">واحد اندازه گیری</th>
                        <th class="hidden-xs">نوع فعالیت</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0?>
                    @foreach($category as $cate)
                        <tr>
                            <td class="center">{{++$i}}</td>
                            <td>{{$cate->tblcategorytitle->category_title}}</td>
                            <td class="hidden-xs">{{$cate->tblcategorymeasure->category_measure_title}}</td>

                            <td class="hidden-xs">{{$cate->category_type}}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="{{route("basedata.edit",['category_id'=>$cate->category_id])}}" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i style="font-size: large" class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i style="font-size: large" class="fa fa-times fa fa-white"></i></a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group" dropdown>
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" dropdown-toggle>
                                            <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right dropdown-light" role="menu">
                                            <li>
                                                <a href="#">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Share
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Remove
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {!! $category->appends(Request::query())->render() !!}

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
    <script src="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

@endsection
