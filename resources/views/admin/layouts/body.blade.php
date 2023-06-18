<!DOCTYPE html>
<html lang="en">

<head>

    <base href="{{ URL::to('/') }}">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intergrated Holistic Care</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="backend/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="backend/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    @stack('styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <div class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
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
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside style="background-color:white" class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a style="margin-top:-10px;" href="/" class="brand-link">
            <div class="pb-1" style="margin-left:0px; text-align:center;"><img width="120" height="60"
                                                                               src="images/Intergrated_holistic_care_logo.png"
                                                                               alt=""></div>
            <div class="logo_text"
                 style="margin-bottom:-5px; color:rgb(27,184,191); font-size:18px; text-align:center;">INTEGRATED
                HOLISTIC
            </div>
            <div class="logo_text" style="text-align:center; font-size:18px; color:rgb(27,184,191);"> CARE
            </div>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">
                            <i style="color: rgb(27, 184, 191);" class="nav-icon fa fa-home"></i>
                            <p style="font-weight:bold; color: rgb(27, 184, 191);">Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('students.index') }}" class="nav-link">
                            <i style="color: rgb(27, 184, 191);" class="nav-icon fa fa-users"></i>
                            <p style="font-weight:bold; color: rgb(27, 184, 191);">Students</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link">
                            <i style="color: rgb(27, 184, 191);" class="nav-icon fa fa-file"></i>
                            <p style="font-weight:bold; color: rgb(27, 184, 191);">Courses</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a id="logoutbtn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"
                           class="nav-link">
                            <i style="color:red;" class="nav-icon fa fa-arrow-alt-circle-left"></i>
                            <p style="font-weight:bold; color:red;">Logout</p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>

                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="position:relative">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $page_title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $page_title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <div class="toast" style="min-width:300px; margin-right:10px; margin-top:7px; background-color:green; z-index:2; position: absolute; top: 0; right: 0;" role="alert" aria-live="assertive" data-delay="3000" aria-atomic="true">
            <div style="background-color:green; border-bottom:1px solid white;" class="toast-header">
                <strong  style="color:white;" class="mr-auto">Success</strong>
            </div>
            <div style="color:white;" class="toast-body">
                Heads up, toasts will stack automatically
            </div>
        </div>

        @yield('content')

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="https://integratedholisticcare.org/">Integrated Holistic
                Care</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="backend/dist/js/pages/dashboard.js"></script>
@stack('scripts')
</body>

</html>
