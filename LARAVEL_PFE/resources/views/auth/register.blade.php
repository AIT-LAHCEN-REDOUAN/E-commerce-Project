<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>register</title>
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
    
    <!-- jQuery -->


</head>

<body>
    <div id="app">
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="" alt="login" class="login-card-img">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <div class="brand-wrapper">
                                    <img src="/img/logo.png" alt="logo" class="logo">
                                </div>
                                <p class="login-card-description">Register a new account</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="sr-only">Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
        
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                    </div>
                                    <input name="register" id="register" class="btn btn-block login-btn mb-4" type="submit" value="Register">
                                </form>
                                <a href="#!" class="forgot-password-link">Forgot password?</a>
                                <p class="login-card-footer-text">Alredy have an account? <a href="{{ route('login') }}" class="text-reset">Login here</a></p>
                                <nav class="login-card-footer-nav">
                                    <a href="#!">Terms of use.</a>
                                    <a href="#!">Privacy policy</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
