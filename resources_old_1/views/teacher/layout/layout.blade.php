@php
    use App\Models\Teacher;
    $teacherId=session('teacherId');
    $details=Teacher::where('id',$teacherId)->first();
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
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/teacher/img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/css/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/fonts/flaticon.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/css/animate.min.css')}}">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/css/jquery.dataTables.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{url('assets/teacher/style.css')}}">
    <!-- css for cards in assignment -->
    <link rel="stylesheet" href="{{url('assets/teacher/css/cards.css')}}">
    
    <!-- Modernize js -->
    @yield('styles')
    <script src="{{url('assets/teacher/js/modernizr-3.6.0.min.js')}}"></script>
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
                        <img src="{{url('assets/teacher/img/logo.png')}}" alt="logo">
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
                        <!-- <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div> -->
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{$details->name}}</h5>
                                <span>Teacher</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{url('assets/teacher/img/figure/admin.jpg')}}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{$details->name}}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li>
                                    {{-- <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li> --}}
                                    <li><a href="{{route('teacher.logout')}}"><i class="flaticon-turn-off"></i>Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one" style="min-height: 95vh;">
            <!-- Sidebar Area Start Here -->
           <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="{{url('assets/teacher/img/logo1.png')}}" alt="logo"></a>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('teacher/dashboard')}}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                    
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{url('teacher/all-students')}}" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            {{-- <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{url('teacher/all-students')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('teacher/student-details')}}" class="nav-link"><i class="fas fa-angle-right"></i>Student Details</a>
                                </li>
              
                            </ul> --}}
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="{{ route('teacher.listGroups') }}" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Groups</span></a>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="{{ route('teacher.notice.board') }}" class="nav-link"><i class="flaticon-multiple-users-silhouette"></i><span>Notice Board</span></a>
                        </li>
         
                        {{-- <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Quiz</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <a href="{{url('teacher/quiz-schedule')}}" class="nav-link"><i class="fas fa-angle-right"></i>Quiz Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('teacher/quiz-grades')}}" class="nav-link"><i class="fas fa-angle-right"></i>Quiz Grades</a>
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
    <script src="{{url('assets/teacher/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{url('assets/teacher/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{url('assets/teacher/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{url('assets/teacher/js/bootstrap.min.js')}}"></script>
    <!-- Counterup Js -->
    <script src="{{url('assets/teacher/js/jquery.counterup.min.js')}}"></script>
    <!-- Waypoints Js -->
    <script src="{{url('assets/teacher/js/jquery.waypoints.min.js')}}"></script>
    <!-- Scroll Up Js -->
    <script src="{{url('assets/teacher/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Data Table Js -->
    <script src="{{url('assets/teacher/js/jquery.dataTables.min.js')}}"></script>
    <!-- Chart Js -->
    <script src="{{url('assets/teacher/js/Chart.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{url('assets/teacher/js/main.js')}}"></script>

    @yield('scripts')

    <script>

        function fetchStudentsList()
            {
                let classValue = document.getElementById('select_class').value;
                //let teacherId = document.getElementById('teacherId').value
                // console.log(classId);
                // console.log(teacherId);
                // return;
                // let tt = '{{ url("teacher/fetchStudents") }}/' + classValue
                // console.log(tt);
                // return;
                $.ajax({
                    type:'GET',
                    url:'{{ url("teacher/fetchStudents") }}/' + classValue,
                    success:function(data) {
                        $("#select_students").html(data);
                    }
                    });
            }
            
    </script>

</body>

</html>