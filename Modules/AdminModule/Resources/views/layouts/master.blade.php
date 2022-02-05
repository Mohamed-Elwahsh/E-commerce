<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('admine/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admine/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="{{asset('public/admine/css-rtl/plugins/animate/animate.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('public/admine/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('public/admine/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/pages/chat-application.css')}}">
    <!-- END VENDOR CSS-->
   <!-- BEGIN MODERN CSS-->
   <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/app.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/custom-rtl.css')}}">
   <!-- END MODERN CSS-->
   <!-- BEGIN Page Level CSS-->
   <link rel="stylesheet" type="text/css"
         href="{{asset('public/admine/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/core/colors/palette-gradient.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/fonts/simple-line-icons/style.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/core/colors/palette-gradient.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/pages/timeline.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/cryptocoins/cryptocoins.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/extensions/datedropper.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('admine/vendors/css/extensions/timedropper.min.css')}}">
   <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admine/css-rtl/style-rtl.css')}}">
  <!-- END Custom CSS-->

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu 2-columns  @if(Request::is('admine/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
@include('adminmodule::includes.header')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('adminmodule::includes.sidebar')

@yield('content')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('adminmodule::includes.footer')

@notify_js
@notify_render

<!-- BEGIN VENDOR JS-->
<script src="{{asset('admine/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('admine/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admine/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('admine/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admine/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admine/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('admine/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

<script src="{{asset('admine/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

<script src="{{asset('admine/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('admine/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('admine/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('admine/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>


<script src="{{asset('admine/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>
<script src="{{asset('admine/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('admine/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>

<script src="{{asset('admine/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>

<script>
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians6').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true,setCurrentTime: false
    });
</script>
@yield('script')
</body>
</html>