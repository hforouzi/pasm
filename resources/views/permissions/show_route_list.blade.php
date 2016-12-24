@extends('layouts.main')
<link href="/vendor/jstree/themes/default/style.min.css" rel="stylesheet" media="screen">

@section('content')
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">فهرست توابع و تعریف دسترسی ها </h4>
            </div>

            <div class="panel-body">

                {!! Form::open(['route'=>'routelist.get_data']) !!}
                <div class="col-md-6">

                <div id="tree_2" class="tree-demo"></div>
                <input type="hidden" name="array_check" id="array_check" value="" />
</div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">
                            نام دسترسی <span class="symbol required" aria-required="true"></span>
                        </label>
                        {!! Form::text('per_name',null,array('placeholder' => "اسم دسترسی را وارد نمایید",'class' => 'form-control'))!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-wide pull-right" type="submit" id="send">
                            ذخیره <i class="fa fa-floppy-o"></i>
                        </button>
                    </div>
                </div>
                        {!! Form::close() !!}
            </div>
        </div>
    </div>


    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="/vendor/jstree/jstree.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: JavaScript Event Handlers for this page -->
    @include('permissions.jstree_route_list')
    <script>
        jQuery(document).ready(function() {
            UITreeview.init();
        });
        $("#send").click(function () {

            var checked_ids=[];
            checked_ids.push($('#tree_2').jstree('get_checked',null,true));
            //setting to hidden field
            document.getElementById('array_check').value = checked_ids.join(",");

        });
    </script>
@endsection