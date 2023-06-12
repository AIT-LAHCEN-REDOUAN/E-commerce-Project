<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">ADMIN PANEL</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block">ANOUAR El haouass</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-th"></i>
                            <p>
                                Categorie
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Afficher Les Categorie</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('category.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Une Categorie</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tags"></i>
                            <p>
                                Marque
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('marque.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Afficher Les Marques</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('marque.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Une Marque</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-shopping-cart"></i>
                            <p>
                                produits
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/product_index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Afficher les produits </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('product.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter un produit</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list"></i>
                            <p>
                                Type
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('type.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Afficher les Types </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('type.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Un Type</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-receipt"></i>
                            <p>
                                Commande
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('command.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Afficher les Commandes </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>
                                Compte
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('compte.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Afficher les Comptes </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li style="text-align: center ; position: relative; top: 100px " class="nav-item">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button class="btn btn-secondary " type="submit">LOG OUT</button>
                        </form>
                    </li>
                </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$data}}</h3>

                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$Number}}<sup style="font-size: 20px">%</sup></h3>

                                    <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$user}}</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$Connected}}</h3>

                                    <p>Connected Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Sales
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#revenue-chart"
                                                    data-toggle="tab">Area</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <!-- Morris chart - Sales -->
                                        <div class="chart tab-pane active" id="revenue-chart"
                                            style="position: relative; height: 300px;">
                                            <canvas id="revenue-chart-canvas" height="300"
                                                style="height: 300px;"></canvas>
                                        </div>
                                        <div class="chart tab-pane" id="sales-chart"
                                            style="position: relative; height: 300px;">
                                            <canvas id="sales-chart-canvas" height="300"
                                                style="height: 300px;"></canvas>
                                        </div>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- DIRECT CHAT -->


                            <!-- TO DO List -->

                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">

                            <!-- Map card -->
                            <div class="card bg-gradient-primary">

                                <!-- /.card-body-->
                                <div class="card-footer bg-transparent">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <div id="sparkline-1"></div>

                                        </div>
                                        <!-- ./col -->
                                        <div class="col-4 text-center">
                                            <div id="sparkline-2"></div>

                                        </div>
                                        <!-- ./col -->
                                        <div class="col-4 text-center">
                                            <div id="sparkline-3"></div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.card -->

                            <!-- solid sales graph -->
                            <div class="card bg-gradient-info">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="fas fa-th mr-1"></i>
                                        Sales Graph
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn bg-info btn-sm"
                                            data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas class="chart" id="line-chart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-transparent">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="20"
                                                data-width="60" data-height="60" data-fgColor="#39CCCC">

                                            <div class="text-white">Mail-Orders</div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="50"
                                                data-width="60" data-height="60" data-fgColor="#39CCCC">

                                            <div class="text-white">Online</div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="30"
                                                data-width="60" data-height="60" data-fgColor="#39CCCC">

                                            <div class="text-white">In-Store</div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->

                            <!-- Calendar -->

                            <!-- /.card -->
                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>
