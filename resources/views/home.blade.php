@extends('layouts.main')

@section('content')

        <div class="main-content" >
            <div class="wrap-content container" id="container">
                <!-- start: DASHBOARD TITLE -->
                <section id="page-title" class="padding-top-15 padding-bottom-15">
                    <div class="row">
                        <div class="col-sm-7">
                            <h1 class="mainTitle">پاک</h1>
                            <span class="mainDescription">پیشگیری از آودگی محیط  ، ارتقا  فرهنگ عمومی ، کاهش زباله  </span>
                        </div>
                        <div class="col-sm-5">
                            <!-- start: MINI STATS WITH SPARKLINE -->
                            <ul class="mini-stats pull-left">
                                <li>
                                    <div class="sparkline-1">
                                        <span ></span>
                                    </div>
                                    <div class="values">
                                        <strong class="text-dark">18304</strong>
                                        <p class="text-small no-margin">
                                            کاربران
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sparkline-2">
                                        <span ></span>
                                    </div>
                                    <div class="values">
                                        <strong class="text-dark">&#36;3,833</strong>
                                        <p class="text-small no-margin">
                                            درآمد
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sparkline-3">
                                        <span ></span>
                                    </div>
                                    <div class="values">
                                        <strong class="text-dark">&#36;848</strong>
                                        <p class="text-small no-margin">
                                            هزینه
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <!-- end: MINI STATS WITH SPARKLINE -->
                        </div>
                    </div>
                </section>
                <!-- end: DASHBOARD TITLE -->
                <!-- start: FEATURED BOX LINKS -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-white no-radius text-center">
                                <div class="panel-body">
                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                    <h2 class="StepTitle">مدیریت کاربران</h2>
                                    <p class="text-small">
                                        جهت اضافه کردن کاربران جدید نیاز به دسترسی مدیر ارشد را دارید
                                    </p>
                                    <p class="links cl-effect-1">
                                        <a href>
                                            بیشتر
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-white no-radius text-center">
                                <div class="panel-body">
                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                                    <h2 class="StepTitle">مدیریت تقاضا </h2>
                                    <p class="text-small">
                                        ابزار مدیریت تقاضا ها و تایید و رد آن ها
                                    </p>
                                    <p class="cl-effect-1">
                                        <a href>
                                            بیشتر
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-white no-radius text-center">
                                <div class="panel-body">
                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                    <h2 class="StepTitle">مدیریت نظرسنجی</h2>
                                    <p class="text-small">
                                        مدیریت نظرسنجی ، تعریف نظرسنجی جدید
                                    </p>
                                    <p class="links cl-effect-1">
                                        <a href>
                                            بیشتر
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: FEATURED BOX LINKS -->
                <!-- start: FIRST SECTION -->
                <div class="container-fluid container-fullw padding-bottom-10">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-7 col-lg-8">
                                    <div class="panel panel-white no-radius" id="visits">
                                        <div class="panel-heading border-light">
                                            <h4 class="panel-title"> جمع آوری </h4>
                                            <ul class="panel-heading-tabs border-light">
                                                <li>
                                                    <div class="pull-right">
                                                        <div class="btn-group">
                                                            <a class="padding-10" data-toggle="dropdown">
                                                                <i class="ti-more-alt "></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-light" role="menu">
                                                                <li>
                                                                    <a href="#">
                                                                        چاپ
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        ذخیره
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        اشتراک گذاری
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="rate">
                                                        <i class="fa fa-caret-up text-primary"></i><span class="value">15</span><span class="percentage">%</span>
                                                    </div>
                                                </li>
                                                <li class="panel-tools">
                                                    <a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div collapse="visits" class="panel-wrapper">
                                            <div class="panel-body">
                                                <div class="height-350">
                                                    <canvas id="chart1" class="full-width"></canvas>
                                                    <div class="margin-top-20">
                                                        <div class="inline pull-left">
                                                            <div id="chart1Legend" class="chart-legend"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-4">
                                    <div class="panel panel-white no-radius">
                                        <div class="panel-heading border-light">
                                            <h4 class="panel-title"> میزان مشارکت دست چین </h4>
                                        </div>
                                        <div class="panel-body">
                                            <h3 class="inline-block no-margin">26</h3> تعداد کل
                                            <div class="progress progress-xs no-radius">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                    <span class="sr-only"> 80% Complete</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h4 class="no-margin">15</h4>
                                                    <div class="progress progress-xs no-radius no-margin">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                            <span class="sr-only"> 80% </span>
                                                        </div>
                                                    </div>
                                                    تحویل مستقیم
                                                </div>
                                                <div class="col-sm-4">
                                                    <h4 class="no-margin">7</h4>
                                                    <div class="progress progress-xs no-radius no-margin">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                            <span class="sr-only"> 60% Complete</span>
                                                        </div>
                                                    </div>
                                                    درب منزل
                                                </div>
                                                <div class="col-sm-4">
                                                    <h4 class="no-margin">4</h4>
                                                    <div class="progress progress-xs no-radius no-margin">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                                            <span class="sr-only"> 40% Complete</span>
                                                        </div>
                                                    </div>
                                                    گردشی
                                                </div>
                                            </div>
                                            <div class="row margin-top-30">
                                                <div class="col-xs-4 text-center">
                                                    <div class="rate">
                                                        <i class="fa fa-caret-up text-green"></i><span class="value">26</span><span class="percentage">%</span>
                                                    </div>
                                                    درب منزل

                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <div class="rate">
                                                        <i class="fa fa-caret-up text-green"></i><span class="value">62</span><span class="percentage">%</span>
                                                    </div>
                                                    مستقیم
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <div class="rate">
                                                        <i class="fa fa-caret-down text-red"></i><span class="value">12</span><span class="percentage">%</span>
                                                    </div>
                                                    گردشی														</div>
                                            </div>
                                            <div class="margin-top-10">
                                                <div class="height-180">
                                                    <canvas id="chart2" class="full-width"></canvas>
                                                    <div class="inline pull-left legend-xs">
                                                        <div id="chart2Legend" class="chart-legend"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: FIRST SECTION -->
                <!-- start: SECOND SECTION -->
                <div class="container-fluid container-fullw  padding-bottom-10">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-white no-radius">
                                <div class="panel-body">
                                    <div class="partition-light-grey padding-15 text-center margin-bottom-20">
                                        <h4 class="no-margin">گزارش ماهانه مشارکت</h4>
                                        <span class="text-light">بر اساس مناطق</span>
                                    </div>
                                    <div id="accordion" class="panel-group accordion accordion-white no-margin">
                                        <div class="panel no-radius">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15">
                                                        <i class="icon-arrow"></i>
                                                        ماه جاری <span class="label label-danger pull-left">3</span>
                                                    </a></h4>
                                            </div>
                                            <div class="panel-collapse collapse in" id="collapseOne">
                                                <div class="panel-body no-padding partition-light-grey">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td>منطقه 1</td>
                                                            <td class="center">4909</td>
                                                            <td><i class="fa fa-caret-down text-red"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td>منطقه 2</td>
                                                            <td class="center">3857</td>
                                                            <td><i class="fa fa-caret-up text-green"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3</td>
                                                            <td>منطقه 3</td>
                                                            <td class="center">1789</td>
                                                            <td><i class="fa fa-caret-up text-green"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">4</td>
                                                            <td>منطقه 4</td>
                                                            <td class="center">612</td>
                                                            <td><i class="fa fa-caret-down text-red"></i></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel no-radius">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15 collapsed">
                                                        <i class="icon-arrow"></i>
                                                        ماه گذشته
                                                    </a></h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="collapseTwo">
                                                <div class="panel-body no-padding partition-light-grey">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td class="center">1</td>
                                                            <td>منطقه 1</td>
                                                            <td class="center">5228</td>
                                                            <td><i class="fa fa-caret-up text-green"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">2</td>
                                                            <td>منطقه 2</td>
                                                            <td class="center">2853</td>
                                                            <td><i class="fa fa-caret-up text-green"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">3</td>
                                                            <td>منطقه 3</td>
                                                            <td class="center">1948</td>
                                                            <td><i class="fa fa-caret-up text-green"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="center">4</td>
                                                            <td>منطقه 4</td>
                                                            <td class="center">456</td>
                                                            <td><i class="fa fa-caret-down text-red"></i></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-white no-radius">
                                <div class="panel-heading border-bottom">
                                    <h4 class="panel-title">کاربران جدید</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="text-center">
                                        <span class="mini-pie"> <canvas id="chart3" class="full-width"></canvas> <span>450</span> </span>
                                        <span class="inline text-large no-wrap">مناطق</span>
                                    </div>
                                    <div class="margin-top-20 text-center legend-xs inline">
                                        <div id="chart3Legend" class="chart-legend"></div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="clearfix padding-5 space5">
                                        <div class="col-xs-4 text-center no-padding">
                                            <div class="border-left border-dark">
                                                <span class="text-bold block text-extra-large">90%</span>
                                                <span class="text-light">دوجین</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 text-center no-padding">
                                            <div class="border-left border-dark">
                                                <span class="text-bold block text-extra-large">2%</span>
                                                <span class="text-light">درهم</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 text-center no-padding">
                                            <span class="text-bold block text-extra-large">8%</span>
                                            <span class="text-light">هیچکدام</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: SECOND SECTION -->
                <!-- start: FOURTH SECTION -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">

                    </div>
                </div>
                <!-- end: FOURTH SECTION -->
            </div>
        </div>
    </div>
        <!-- start: JavaScript Event Handlers for this page -->
        <script src="/assets/js/index.js"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Index.init();
            });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
@endsection
