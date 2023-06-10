<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css') }}">
    
    @yield('style_css')
    <!-- jQuery -->


</head>

<body>
    <div id="app">
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            @yield('content')
        </main>
    </div>
    



        <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
        <script src="{{asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
        <script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
        <script src="{{asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
        <script src="{{asset('dist/js/adminlte.min.js') }}"></script>
        <script src="{{asset('dist/js/demo.js') }}"></script>
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- Moment.js -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <!-- Date Range Picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- OverlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
