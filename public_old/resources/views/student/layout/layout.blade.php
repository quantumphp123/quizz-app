@php
use App\Models\Student;

$studentId=session('studentId');
$details=Student::where('id',$studentId)->first();


@endphp


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/student/img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{url('assets/student/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('assets/student/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/student/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/student/css/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{url('assets/student/fonts/flaticon.css')}}">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{url('assets/student/css/fullcalendar.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('assets/student/css/animate.min.css')}}">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="{{url('assets/student/css/jquery.dataTables.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('assets/student/style.css')}}">
    <!-- Modernize js -->
    <script src="{{url('assets/student/js/modernizr-3.6.0.min.js')}}"></script>
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
                    <a href="">
                        <img src="{{url('public/uploads/Students/'.$details->profilePic)}}" alt="logo"
                            style="width: 50px; border-radius: 50%;">
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
                <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
                    data-target="#mobile-navbar" aria-expanded="false">
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
                                <h5 class="item-title">{{$details->name}}</h5>
                                <span>Student</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{ url('public/uploads/Students/'.$details->profilePic) }}" alt="Student"
                                    style="width:40px;height:40px;">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{$details->name}}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    {{-- <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li> --}}
                                    {{-- <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                                    --}}
                                    <li><a href="{{route('student.logout')}}"><i class="flaticon-turn-off"></i>Log
                                            Out</a></li>
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
                        <a href="index.html"><img src="{{url('assets/student/img/logo1.png')}}" alt="logo"></a>
                    </div>
                </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('student/dashboard')}}" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Dashboard</span></a>

                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('student.group')}}" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>My Group</span></a>

                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('student.other.groups')}}" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Other Groups</span></a>

                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('student.assignments')}}" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Assignments</span></a>

                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('student.points')}}" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>My Points</span></a>

                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{route('student.feedback')}}" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Feedbacks</span></a>

                        </li>


                        {{-- <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Quiz</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{url('student/quiz-schedule')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Quiz
                                        Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('student/quiz-grades')}}" class="nav-link"><i
                                            class="fas fa-angle-right"></i>Quiz
                                        Grades</a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('student/notice')}}" class="nav-link"><i
                                    class="flaticon-script"></i><span>Notice Board</span></a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->

            @yield('content')

        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="{{url('assets/student/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{url('assets/student/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{url('assets/student/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{url('assets/student/js/bootstrap.min.js')}}"></script>
    <!-- Counterup Js -->
    <script src="{{url('assets/student/js/jquery.counterup.min.js')}}"></script>
    <!-- Moment Js -->
    <script src="{{url('assets/student/js/moment.min.js')}}"></script>
    <!-- Waypoints Js -->
    <script src="{{url('assets/student/js/jquery.waypoints.min.js')}}"></script>
    <!-- Scroll Up Js -->
    <script src="{{url('assets/student/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Full Calender Js -->
    <script src="{{url('assets/student/js/fullcalendar.min.js')}}"></script>
    <!-- Chart Js -->
    <script src="{{url('assets/student/js/Chart.min.js')}}"></script>
    <!-- Data Table Js -->
    <script src="{{url('assets/student/js/jquery.dataTables.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{url('assets/student/js/main.js')}}"></script>

</body>

</html>