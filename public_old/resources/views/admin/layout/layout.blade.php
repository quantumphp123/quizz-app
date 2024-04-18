<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/admin/img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/fonts/flaticon.css')}}">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/fullcalendar.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/animate.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/style.css')}}">
    <!-- Modernize js -->
    <script src="{{url('assets/admin/js/modernizr-3.6.0.min.js')}}"></script>

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
                        <img src="{{url('assets/admin/img/logo.png')}}" alt="logo">
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
                    
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">Mireille</h5>
                                <span>Admin</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{url('assets/admin/img/figure/admin.jpg')}}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">Mireille</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="{{route('admin.logout')}}"><i class="flaticon-turn-off"></i>Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="{{url('assets/admin/img/logo1.png')}}" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('admin/dashboard')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('admin/all-students')}}" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            {{-- <ul class="nav sub-group-menu"> --}}
                                {{-- <li class="nav-item">
                                    <a href="{{url('admin/all-students')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Students</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a href="{{url('admin/student-details')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Student Details</a>
                                </li> --}}
                                <!-- <li class="nav-item">
                                    <a href="admit-form.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Admission Form</a>
                                </li>
                                <li class="nav-item">
                                    <a href="student-promotion.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Student Promotion</a>
                                </li> -->
                            {{-- </ul> --}}
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('admin/all-teachers')}}" class="nav-link"><i
                                    class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                            {{-- <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{url('admin/all-teachers')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/teacher-details')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Teacher Details</a>
                                </li> --}}
                                <!-- <li class="nav-item">
                                    <a href="add-teacher.html" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                        Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a href="teacher-payment.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Payment</a>
                                </li> -->
                            {{-- </ul> --}}
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('admin/all-parents')}}" class="nav-link"><i class="flaticon-couple"></i><span>Parents</span></a>
                            {{-- <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{url('admin/all-parents')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                        Parents</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/parent-deatils')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Parents Details</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a href="{{url('admin/groups')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                                        Groups</a>
                                </li> --}}
                            {{-- </ul> --}}
                        </li>
                        
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('admin/groups')}}" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Groups</span></a>
                        </li>

                        {{-- <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Quiz</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{url('admin/quiz-schedule')}}" class="nav-link"><i class="fas fa-angle-right"></i>Quiz Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/quiz-grades')}}" class="nav-link"><i class="fas fa-angle-right"></i>Quiz Grades</a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
       

            @yield('content')


        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="{{url('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{url('assets/admin/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{url('assets/admin/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{url('assets/admin/js/bootstrap.min.js')}}"></script>
    <!-- Counterup Js -->
    <script src="{{url('assets/admin/js/jquery.counterup.min.js')}}"></script>
    <!-- Moment Js -->
    <script src="{{url('assets/admin/js/moment.min.js')}}"></script>
    <!-- Waypoints Js -->
    <script src="{{url('assets/admin/js/jquery.waypoints.min.js')}}"></script>
    <!-- Scroll Up Js -->
    <script src="{{url('assets/admin/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Full Calender Js -->
    <script src="{{url('assets/admin/js/fullcalendar.min.js')}}"></script>
    <!-- Chart Js -->
    <script src="{{url('assets/admin/js/Chart.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{url('assets/admin/js/main.js')}}"></script>
    
    @yield('scripts')
</body>

</html>