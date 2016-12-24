@extends("layouts.main")
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h5 class="over-title margin-bottom-15">فهرست فعالیت های <span class="text-bold">انجام شده</span></h5>
            <div class="row" id="table">
                {!! $send_data["table"] !!}
            </div>
            <div class="row">
                <table class="table table-striped table-bordered table-hover" id="sample-table-2">
                    <tr>
                        <td colspan="4">قیمت پایه ماهانه جمع آوری و حمل پسماندها - ریال</td>
                        <td>{{$send_data['total'][1]}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">قیمت پایه ماهانه رفت و روب و تنظیف - ریال</td>
                        <td>{{$send_data['total'][3]+$send_data['total'][4]}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">قیمت پایه ماهانه تامین نیروی کنترل و نظارت - ریال</td>
                        <td>{{$send_data['total'][5]}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">قیمت پایه ماهانه کل پیمان - ریال</td>
                        <td>{{$send_data['total'][1]+$send_data['total'][3]+$send_data['total'][4]+$send_data['total'][5]}}</td>
                    </tr>
                    <tr>
                        <?php $total=$send_data['total'][1]+$send_data['total'][3]+$send_data['total'][4]+$send_data['total'][5];?>
                        <td colspan="4">مبلغ کل پیمان - ریال</td>
                        <td>{{$total-((($total)*3.83)/100)}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="row">
        <a href="{{route('activity.output_excell',[$send_data['year'],$send_data['month'],$send_data['scope']])}}" class="btn btn-success">
دریافت فایل اکسل
        </a>
    </div>
@endsection