
<!doctype html>
<html class="no-js" lang="fa">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/images/favicon.ico')}}">


    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/vendor/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/vendor/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendor/cryptocurrency-icons.css')}}">
    <link href="{{asset('admin/plugins/md.bootstrappersiandatetimepicker/dist/jquery.md.bootstrap.datetimepicker.js/dist/jquery.md.bootstrap.datetimepicker.style.css')}}" rel="stylesheet"/>

    <!-- Plugins CSS -->
{{--    <link rel="stylesheet" href="{{asset('admin/css/plugins/plugins.css')}}">--}}

    <!-- Helper CSS -->
{{--    <link rel="stylesheet" href="{{asset('admin/css/helper.css')}}">--}}

    <!-- Main Style CSS -->
{{--    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">--}}

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="{{asset('admin/css/style-primary.css')}}">

</head>

<body dir="rtl">


<div class="main-wrapper">


   @include('admin.sections.topbar')
  @include('admin.sections.sidebar')

    <!-- Content Body Start -->
    <div class="content-body">

        @yield('content')


    </div><!-- Content Body End -->

</div>

<!-- JS
============================================ -->

<!-- Global Vendor, plugins & Activation JS -->
<script src="{{asset('admin/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('admin/js/vendor/bootstrap.min.js')}}"></script>
<!--Plugins JS-->
<script src="{{asset('admin/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/tippy4.min.js.js')}}"></script>
<!--Main JS-->
<script src="{{asset('admin/js/main.js')}}"></script>

<!-- Plugins & Activation JS For Only This Page -->

<!--Moment-->
<script src="{{asset('admin/js/plugins/moment/moment.min.js')}}"></script>

<!--Daterange Picker-->
<script src="{{asset('admin/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('admin/js/plugins/daterangepicker/daterangepicker.active.js')}}"></script>

<!--VMap-->
<script src="{{asset('admin/js/plugins/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/vmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('admin/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('admin/plugins/md.bootstrappersiandatetimepicker/dist/jquery.md.bootstrap.datetimepicker.js')}}"></script>
<script src="{{asset('admin/plugins/czMore/js/jquery.czMore-latest.js')}}"></script>
@yield('script')

</body>


</html>
