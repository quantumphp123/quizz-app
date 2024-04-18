@extends('teacher.layout.layout')

@section('title','Teacher-Dashboard')

@section('content')
    
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Teacher Dashboard</h3>
 
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <!-- Dashboard summery Start Here -->
        <div class="col-12 col-4-xxxl">
            <div class="row">
                <div class="col-6-xxxl col-lg-6 col-sm-6 col-12">
                    <div class="dashboard-summery-two">
                        <div class="item-icon bg-light-magenta">
                            <i class="flaticon-classmates text-magenta"></i>
                        </div>
                        <div class="item-content">
                            <div class="item-number"><span class="counter" data-num="{{ $studentCount }}">{{ $studentCount }}</span></div>
                            <div class="item-title">Total Students</div>
                        </div>
                    </div>
                </div>
                <div class="col-6-xxxl col-lg-6 col-sm-6 col-12">
                    <div class="dashboard-summery-two">
                        <div class="item-icon bg-light-blue">
                            <i class="flaticon-shopping-list text-blue"></i>
                        </div>
                        <div class="item-content">
                            <div class="item-number"><span class="counter" data-num="0">0</span></div>
                            <div class="item-title">Total Quizzes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard summery End Here -->
        
        
        <!-- Students Chart End Here -->
        <!-- Notice Board Start Here -->
        <div class="col-lg-12 col-4-xxxl col-xl-12">
            <div class="card dashboard-card-six">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Notifications</h3>
                        </div>
                    </div>
                    <div class="notice-box-wrap">
                        <div class="notice-list">
                            <div class="post-date bg-skyblue">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag mene esom tus eleifend lectus
                                sed maximus mi faucibusnting.</a></h6>
                            <div class="entry-meta">  Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-yellow">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                            <div class="entry-meta">  Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-pink">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag Nulla rhoncus eleifensed mim
                                us mi faucibus id. Mauris vestibulum non purus lobortismenearea</a></h6>
                            <div class="entry-meta">  Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-skyblue">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag mene esom  text of the printing.</a></h6>
                            <div class="entry-meta">  Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-yellow">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                            <div class="entry-meta">  Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-pink">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag meneesom.</a></h6>
                            <div class="entry-meta">  Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Notice Board End Here -->
    </div>
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
    </footer>
    
</div>
    
@endsection