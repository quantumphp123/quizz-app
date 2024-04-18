@extends('admin.layout.layout')

@section('title','Admin-Dashboard')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Admin Dashboard</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Admin</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
    <div class="row gutters-20">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="flaticon-classmates text-green"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Students</div>
                            <div class="item-number"><span class="counter" data-num="{{ $total['students'] }}">{{
                                    $total['students'] }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-blue">
                            <i class="flaticon-multiple-users-silhouette text-blue"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Teachers</div>
                            <div class="item-number"><span class="counter" data-num="{{ $total['teachers'] }}">{{
                                    $total['teachers'] }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-yellow">
                            <i class="flaticon-couple text-orange"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Parents</div>
                            <div class="item-number"><span class="counter" data-num="{{ $total['parents'] }}">{{
                                    $total['parents'] }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-3 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-red">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Earnings</div>
                            <div class="item-number"><span>$</span><span class="counter" data-num="193000">1,93,000</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Dashboard summery End Here -->
    {{-- <h3>
        {{ session('adminId') }}
    </h3> --}}
    <!-- Dashboard Content Start Here -->
    <div class="row gutters-20">
        <div class="col-12 col-xl-6 col-3-xxxl">
            <div class="card dashboard-card-three pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Students</h3>
                        </div>
                        {{-- <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="doughnut-chart-wrap">
                        <canvas id="student-doughnut-chart-custom" width="100" height="300"></canvas>
                    </div>
                    <div class="student-report">
                        <div class="student-count pseudo-bg-blue">
                            <h4 class="item-title">Female Students</h4>
                            <div class="item-number" id="female-student-count">{{ $total['female_students'] }}</div>
                        </div>
                        <div class="student-count pseudo-bg-yellow">
                            <h4 class="item-title">Male Students</h4>
                            <div class="item-number" id="male-student-count">{{ $total['male_students'] }}</div>
                        </div>
                        <div class="student-count pseudo-bg-red">
                            <h4 class="item-title">Other Students</h4>
                            <div class="item-number" id="other-student-count">{{ $total['other_students'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-xl-6 col-4-xxxl">
            <div class="card dashboard-card-four pd-b-20">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Event Calender</h3>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="calender-wrap">
                        <div id="fc-calender" class="fc-calender"></div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-9 col-xl-9 col-9-xxxl">
            <div class="card dashboard-card-six pd-b-20">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;{{ session('success') }}</span>
                    </button>
                </div>
                @endif
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Notice Board</h3>
                        </div>

                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#noticeBoard">Add Notice</button>
                        {{-- <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="notice-box-wrap">
                        @foreach ($notifies as $notify)
                        <div class="notice-list">
                            <div class="post-date text-dark" style="background-color: #BADFDA;">{{ date('d-M-Y',
                                strtotime($notify['created_at'])) }}</div>
                            <h6 class="notice-title"><a href="#">{{ $notify['title'] }}</a></h6>
                            <p>{{ $notify['description'] }}</p>
                            <div class="entry-meta">{{ time_ago(strtotime($notify['created_at'])) }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Content End Here -->

    <div class="modal fade" id="noticeBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notice to Notice Board</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.notifies.post') }}" method="post">
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" class="form-control mb-3" name="title" id="title" required>
                        <label for="description">Describe</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="8"
                            placeholder="Describe the Notic" required></textarea>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-3">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Area Start Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
    <!-- Footer Area End Here -->
</div>

@endsection

@section('scripts')
{{-- <script>
    console.log("HELLO RENDERED")
    var doughnutChartData = {
      labels: ["Female", "Male Students"],
      datasets: [{
        backgroundColor: ["#304ffe", "#ffa601"],
        data: [45000, 105000],
        label: "Total Students"
      }, ]
    };
    var doughnutChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      cutoutPercentage: 65,
      rotation: -9.4,
      animation: {
        duration: 2000
      },
      legend: {
        display: false
      },
      tooltips: {
        enabled: true
      },
    };
    var studentCanvas = $("#student-doughnut-chart-custom").get(0).getContext("2d");
    var studentChart = new Chart(studentCanvas, {
      type: 'doughnut',
      data: doughnutChartData,
      options: doughnutChartOptions
    });
</script> --}}
<script>
    console.log("RENDERED")
        let analytic = document.querySelector('#student-doughnut-chart-custom').getContext("2d")
        let female = document.querySelector('#female-student-count').innerHTML
        let male = document.querySelector('#male-student-count').innerHTML
        let other = document.querySelector('#other-student-count').innerHTML
        let chartData = {
                labels: ["Female", "Male", "Other"],
                datasets: [{
                    data: [female, male, other],
                    backgroundColor: ["#304ffe", "#ffa601", "#FF0000"],
                    label: "Total Students",
                }],
            }
        let chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 65,
            rotation: -9.4,
            animation: {
              duration: 2000
            },
            legend: {
              display: false
            },
            tooltips: {
              enabled: true
            },
        } 
        let myChart = new Chart(analytic, {
            type: "pie",
            data: chartData,
            options: chartOptions
        })
</script>
@endsection