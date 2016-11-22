@include('layouts.partial.header')
@include('layouts.partial.javascripts')

@include('layouts.partial.sidebar')
@include('layouts.partial.navbar')

<!-- content -->
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
@yield('content')
<!--end---->
<!-- start: FOOTER -->
@include('layouts.partial.footer')
    <!-- end: FOOTER -->
@include('layouts.partial.off-sidebar')
@include('layouts.partial.setting')
</body>
</html>