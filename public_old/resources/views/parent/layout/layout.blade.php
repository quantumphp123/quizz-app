@php
    use Illuminate\Support\Facades\DB;

    $parent_id=session('parentId');
    $details=DB::table('parents')->where('id',$parent_id)->first();


@endphp



<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/parent/img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/css/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/fonts/flaticon.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/css/animate.min.css')}}">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/css/jquery.dataTables.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('assets/parent/style.css')}}">
    <!-- select2 -->
    <link rel="stylesheet" href="{{url('assets/parent/css/select2.min.css')}}">
    <!-- datepicker -->
    <link rel="stylesheet" href="{{url('assets/parent/css/datepicker.min.css')}}">
    @yield('styles')
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="{{url('assets/parent/img/logo.png')}}" alt="logo">
                    </a>
                </div>
                  <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ ucwords($details->name) }}</h5>
                                <span>Parent</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{url('assets/parent/img/figure/admin.jpg')}}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{ ucwords($details->name) }}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="{{route('parent.change.password')}}"><i class="flaticon-user"></i>Change Password</a></li>
                                    {{-- <li><a href="{{route('parent.profile')}}"><i class="flaticon-user"></i>My Profile</a></li> --}}
                                    {{-- <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li> --}}
                                    <li><a href="{{route('parent.logout')}}"><i class="flaticon-turn-off"></i>Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one" style="min-height: 98vh;">
            <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="{{url('assets/parent/img/logo1.png')}}" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">

                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('parent.dashboard')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('parent.notice.board')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Notice Board</span></a>
                        </li>

                        {{-- <li class="nav-item sidebar-nav-item">
                            <a href="{{route('parent.teacher.feedback')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Feedbacks</span></a>
                        </li> --}}
                        
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
  

            @yield('content')



        </div>
        <!-- Page Area End Here -->
    </div>
    
        <!-- Modernize js -->
        <script src="{{url('assets/parent/js/modernizr-3.6.0.min.js')}}"></script>
    <!-- jquery-->
    <script src="{{url('assets/parent/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{url('assets/parent/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{url('assets/parent/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{url('assets/parent/js/bootstrap.min.js')}}"></script>
    <!-- Counterup Js -->
    <script src="{{url('assets/parent/js/jquery.counterup.min.js')}}"></script>
    <!-- Waypoints Js -->
    <script src="{{url('assets/parent/js/jquery.waypoints.min.js')}}"></script>
    <!-- Scroll Up Js -->
    <script src="{{url('assets/parent/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Data Table Js -->
    <script src="{{url('assets/parent/js/jquery.dataTables.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{url('assets/parent/js/main.js')}}"></script>
    <!--select2-->
    <script src="{{url('assets/parent/js/select2.min.js')}}"></script>
    <!--datepicker-->
    <script src="{{url('assets/parent/js/datepicker.min.js')}}"></script>
    {{-- font-awesome --}}
    <script src="https://kit.fontawesome.com/d3f95ab230.js" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>