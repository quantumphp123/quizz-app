@extends('teacher.layout.layout')

@section('title','Teacher-Dashboard')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Teacher Dashboard</h3>

    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row" style="min-height: 85vh;">
        <!-- Dashboard summery Start Here -->
        <div class="col-12 col-4-xxxl">
            <div class="row">
                @foreach ($class as $key => $info)
                <div class="col-6-xxxl col-lg-6 col-sm-6 col-12">
                    <div class="dashboard-summery-two">
                        <h3>Class {{ $key }}</h3>
                        <div class="item-icon bg-light-magenta">
                            <i class="flaticon-classmates text-magenta"></i>
                        </div>
                        <div class="row justify-content-around">
                            <div class="item-content">
                                @php
                                    $total = $info['male'] + $info['female'] + $info['other']
                                @endphp
                                <div class="item-number"><span class="counter" data-num="{{ $total }}">{{ $total }}</span></div>
                                <div class="item-title">Total Students</div>
                            </div>
                            <div class="item-content">
                                <div class="item-number"><span class="counter" data-num="{{ $info['male'] }}">{{ $info['male'] }}</span></div>
                                <div class="item-title">Total Females</div>
                            </div>
                            <div class="item-content">
                                <div class="item-number"><span class="counter" data-num="{{ $info['female'] }}">{{ $info['female'] }}</span></div>
                                <div class="item-title">Total Males</div>
                            </div>
                            <div class="item-content">
                                <div class="item-number"><span class="counter" data-num="{{ $info['other'] }}">{{ $info['other'] }}</span></div>
                                <div class="item-title">Total Others</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Dashboard summery End Here -->
    </div>
    {{-- <div class="row" style="min-height: 85vh;">
        <!-- Dashboard summery Start Here -->
        @foreach ($class as $key => $info)
        <div class="col-6-xxxl col-lg-6 col-sm-6 col-6">
                <div class="dashboard-summery-two">
                    <h3>Class {{ $key }}</h3>
                    <div class="item-icon bg-light-magenta">
                        <i class="flaticon-classmates text-magenta"></i>
                    </div>
                    <div class="row justify-content-around">
                        <div class="item-content m-3">
                            @php
                            $total = $info['male'] + $info['female'] + $info['other']
                            @endphp
                            <div class="item-number"><span class="counter" data-num="{{ $total }}">{{ $total }}</span>
                            </div>
                            <div class="item-title">Students</div>
                        </div>
                        <div class="item-content m-3">
                            <div class="item-number"><span class="counter" data-num="{{ $info['male'] }}">{{ $info['male'] }}</span>
                            </div>
                            <div class="item-title">Male</div>
                        </div>
                        <div class="item-content m-3">
                            <div class="item-number"><span class="counter" data-num="{{ $info['female'] }}">{{ $info['female'] }}</span>
                            </div>
                            <div class="item-title">Female</div>
                        </div>
                        <div class="item-content m-3">
                            <div class="item-number"><span class="counter" data-num="{{ $info['other'] }}">{{ $info['other'] }}</span>
                            </div>
                            <div class="item-title">Other</div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach --}}
        {{-- <div class="col-6-xxxl col-lg-6 col-sm-6 col-6">
            <div class="dashboard-summery-two">
                <div class="item-icon bg-light-blue">
                    <i class="flaticon-shopping-list text-blue"></i>
                </div>
                <div class="item-content">
                    <div class="item-number"><span class="counter" data-num="0">0</span></div>
                    <div class="item-title">Total Quizzes</div>
                </div>
            </div>
        </div> --}}

        <!-- Dashboard summery End Here -->


        <!-- Students Chart End Here -->
        <!-- Notice Board Start Here -->
        {{-- @foreach ($notifies as $class => $notify)
        <div class="col-lg-12 col-4-xxxl col-xl-12">
            <div class="card dashboard-card-six">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Notifications - Class {{ $class }}</h3>
                        </div>
                    </div>
                    <div class="notice-box-wrap">
                        @foreach ($notify as $noti)
                        <div class="notice-list">
                            <div class="post-date" style="background-color: {{ $noti['hex'] }}; color: #111111">{{
                                ucwords($noti['student_name']) }}</div>
                            <h6 class="notice-title"><a href="#">{{ $noti['title'] }}</a></h6>
                            <div class="entry-meta"> z / <span>{{ time_ago(strtotime($noti['updated_at'])) }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach --}}
        <!-- Notice Board End Here -->
    {{-- </div> --}}

    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
</div>

@endsection