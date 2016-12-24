@include('layouts.partial.header')
@include('layouts.partial.javascripts')
{{--
@if (!Auth::guest())
--}}
    @include('layouts.partial.sidebar')
{{--
@endif
--}}
@include('layouts.partial.navbar')
<!-- content -->
<div class="main-content" >
    <div class="wrap-content container" id="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        @if(count($errors))
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        @endif
{{--
        @if (!Auth::guest())
--}}
            @yield('content')
{{--
        @endif
--}}

    </div>
    <!--end---->
    <!-- start: FOOTER -->
@include('layouts.partial.footer')
<!-- end: FOOTER -->
    <script src="/assets/js/mypersiannumber.js"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
        });
    </script>
    </body>
    </html>