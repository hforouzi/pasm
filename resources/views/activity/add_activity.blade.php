@extends('layouts.main')
@section('content')
    <link type="text/css" href="/vendor/jquery-ui/flick/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />


    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                @include('activity.form_activity')
            </div>
        </div>
    </div>

    <script src="/vendor/jquery-validation/jquery.validate.js"></script>
    <script src="/vendor/jquery-validation/localization/messages_fa.js"></script>
    <script src="/vendor/jquery.ui.datepicker1.8.14-cc/scripts/jquery-1.6.2.min.js"></script>
    <script src="/vendor/jquery.ui.datepicker1.8.14-cc/scripts/jquery.ui.datepicker-cc.all.min.js"></script>
    <script src="/assets/js/mypersiannumber.js"></script>
    <script src="/assets/js/form-validation.js"></script>

    <script>jQuery.noConflict();</script>
    <script>
        jQuery(document).ready(function() {
            Main.init();

        });
        jQuery("#calendar").datepicker({
            dateFormat: 'yy/mm/dd',
            autoSize: true
        });
    </script>

@endsection