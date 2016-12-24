@extends('layouts.app')

@section('content')
    <body class="login">
    <!-- start: REGISTRATION -->
    <div class="row">
        <div class="main-login col-xs-6 col-lg-offset-3">
            <div class="logo margin-top-30">
                <img src="assets/images/logo.png" />
            </div>
            <!-- start: REGISTER BOX -->
            <div class="box-register">
                {!! Form::open(['url'=>'register','files'=>true]) !!}
                    <fieldset>
                        <legend>
                            ثبت نام کاربر
                        </legend>
                        <p>
                            مشخصات فردی را وارد نمایید
                        </p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="نام">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="نام خانوادگی">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="codemelli" placeholder="کدملی    ">
                                </div>
                            </div>
                            <div class="col-xs-6">

                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="block">
                                            جنسیت
                                        </label>
                                    </div>
                                    <div class="col-md-8">

                                    <div class="clip-radio radio-primary">
                                        <input type="radio" id="rg-female" name="gender" value="0">
                                        <label for="rg-female">
                                            زن
                                        </label>
                                        <input type="radio" id="rg-male" name="gender" value="1">
                                        <label for="rg-male">
                                            مرد
                                        </label>
                                    </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="آدرس">
                        </div>

                        <p>
وارد کردن مشخصات کاربری                        </p>
                        <div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="آدرس ایمیل را وارد نمایید">
									<i class="fa fa-envelope"></i> </span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور را وارد نمایید">
									<i class="fa fa-lock"></i> </span>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="password_confirmation" placeholder="دوباره رمز عبور را وارد نمایید">
									<i class="fa fa-lock"></i> </span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-actions">
                            <p>
                               اگر حساب کاربری دارید
                                <a href="{{ url('/login') }}">
                                    وارد شوید !                                </a>
                            </p>
                            <button type="submit" class="btn btn-primary pull-right">
                                ارسال <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
            <!-- end: REGISTER BOX -->
        </div>
    </div>
    <!-- end: REGISTRATION -->
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
@endsection
