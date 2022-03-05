<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" >
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme/dist/css/adminlte.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" >

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('theme/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Logged in as {{ $user->permission_id === 1 ? 'Admin' : 'User' }}: {!! '<strong>' . $user->name . '</strong> (' . $user->email . ')' !!}</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item d-none d-sm-inline-block">
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-navbar" type="submit">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/">
            <img src="{{ asset('images/logo-t.png') }}" alt="Logo" title="Logo" class="logo mt-2 mb-2"/>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Vistech Control Panel
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if($user->permission_id === 1)
                            <li class="nav-item">
                                <a href="/admin/administrators" class="nav-link {{ request()->path() === 'admin/administrators' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Administrators</p>
                                </a>
                            </li>
                            @endif
                            @if($user->permission_id === 1)
                            <li class="nav-item">
                                <a href="/admin/users" class="nav-link {{ request()->path() === 'admin/users' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endif
                            @if($user->permission_id === 1 && false)
                            <li class="nav-item">
                                <a href="/admin/forms" class="nav-link {{ request()->path() === 'admin/forms' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Forms (Admin)</p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="/user/forms" class="nav-link {{ request()->path() === 'user/forms' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Forms</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/user/form_submissions" class="nav-link {{ request()->path() === 'user/form_submissions' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Submission Log</p>
                                </a>
                            </li>
                            @if($user->permission_id === 1)
                            <li class="nav-item">
                                <a href="/admin/answers" class="nav-link {{ request()->path() === 'admin/answers' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Answers</p>
                                </a>
                            </li>
                            @endif
                            @if($user->permission_id === 1)
                                <li class="nav-item">
                                <a href="/admin/emails" class="nav-link {{ request()->path() === 'admin/emails' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Emails</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{!empty($title) ? $title : 'Dashboard'}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            @if(!empty($title) && !empty($link))
                            <li class="breadcrumb-item"><a href="{{$link}}">{{$title}}</a></li>
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @if(isset($_GET['successful']))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                Your submission has been received, thank you.
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($_GET['updated']))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                Record has been successfully updated.
                            </div>
                        </div>
                    </div>
                @endif
                    @if(isset($_GET['deleted']))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    Record has been successfully deleted.
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($_GET['emailed']))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    Emails have been re-sent!
                                </div>
                            </div>
                        </div>
                    @endif
