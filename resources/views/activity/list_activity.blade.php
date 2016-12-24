@extends('layouts.main')
<link href="/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
@section('content')
    <!-- start: PAGE TITLE -->
    <section id="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="mainTitle"> فهرست فعالیت ها</h1>
            </div>
        </div>
    </section>
    <!-- end: PAGE TITLE -->

    <div class="container-fluid container-fullw">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <a class="btn btn-wide btn-primary" href="{{route("activity.create")}}"><i class="ti-plus"></i> اضافه کردن</a>
                </p>
                <table class="table table-striped table-bordered table-hover" id="sample-table-2">
                    <thead>
                    <tr>
                        <th class="center">ردیف</th>
                        <th class="hidden-xs">نام شرکت</th>
                        <th class="hidden-xs">منطقه</th>
                        <th class="hidden-xs">سال</th>
                        <th class="hidden-xs">ماه</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0?>
                    @foreach($data as $item)
                        <tr>
                            <td class="center">{{++$i}}</td>
                            <td>{{$item["contractor_name"]}}</td>
                            <td class="hidden-xs">{{$item["contractor_scope"]}}</td>

                            <td class="hidden-xs">{{$item["activity_year"]}}</td>
                            <td class="hidden-xs">{{$item["activity_month"]}}</td>
                            <td class="center">
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
{{--
                                    <a href="{{route("contractor.edit",['contractor_id'=>$item["activity_id"]])}}" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i style="font-size: large" class="fa fa-pencil"></i></a>
--}}
                                    <a href="{{route("activity.activity_fine",["activity_year"=>$item["activity_year"],"month"=>$item["activity_month"],"scope"=>$item["contractor_scope"]])}}" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove">
                                        <i style="font-size: large" class="fa fa-warning fa fa-white"></i>
                                    </a>
                                    <a href="{{route("activity.activity_calculator",["activity_year"=>$item["activity_year"],"month"=>$item["activity_month"],"scope"=>$item["contractor_scope"]])}}" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove">
                                        <i style="font-size: large" class="fa fa-calculator fa fa-white"></i>
                                    </a>
                                    <a href="#" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove">
                                        <i style="font-size: large" class="fa fa-times fa fa-white"></i>
                                    </a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="btn-group" dropdown>
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" dropdown-toggle>
                                            <i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {!! $data->appends(Request::query())->render() !!}

            </div>
        </div>
    </div>


    <script type="text/javascript" src="/vendor/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
        });
    </script>
@endsection
