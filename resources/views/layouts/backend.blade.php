<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="adminApp">
    <admin-app :auth-user="{{ $authUser }}"></admin-app>
</div>

<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('backend/js/app.js')}}"></script>
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('backend/js/custom.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script>

<script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>

<script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

<script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>

</body>
</html>
