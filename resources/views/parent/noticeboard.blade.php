@extends('parent.layout.layout')

@section('title','Parent Notice-Board')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Notice Board</h3>
        <ul>
            <li>
                <a href="{{ route('parent.dashboard') }}">Home</a>
            </li>
            <li>Notice</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <!-- Add Notice Area Start Here -->
        <!-- <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Create A Notice</h3>
                        </div>
                         <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" 
                            data-toggle="dropdown" aria-expanded="false">...</a>
    
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div>
                    </div>
                    <form class="new-added-form">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Title</label>
                                <input type="text" placeholder="" class="form-control">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Details</label>
                                <input type="text" placeholder="" class="form-control">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Posted By </label>
                                <input type="text" placeholder="" class="form-control">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Date</label>
                                <input type="text" placeholder="" class="form-control air-datepicker">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
        <!-- Add Notice Area End Here -->
        <!-- All Notice Area Start Here -->
        <div class="col-12-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Notice Board</h3>
                        </div>
                         {{-- <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" 
                            data-toggle="dropdown" aria-expanded="false">...</a>
    
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div> --}}
                    </div>
                    <!-- <form class="mg-b-20">
                        <div class="row gutters-8">
                            <div class="col-lg-5 col-12 form-group">
                                <input type="text" placeholder="Search by Date ..." class="form-control">
                            </div>
                            <div class="col-lg-5 col-12 form-group">
                                <input type="text" placeholder="Search by Title ..." class="form-control">
                            </div>
                            <div class="col-lg-2 col-12 form-group">
                                <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                            </div>
                        </div>
                    </form> -->
                    <div class="notice-board-wrap">
                        @foreach ($notices as $notice)
                        <div class="notice-list">
                            <div class="post-date text-dark" style="background-color: #b6c9ec">{{ date('d-M-Y', strtotime($notice['created_at'])) }}</div>
                            <h6 class="notice-title">{{ $notice['title'] }}</h6>
                            <p>{{ $notice['description'] }}</p>
                            {{-- <div class="entry-meta">{{ time_ago(strtotime($notice['created_at'])) }}</div> --}}
                            {{-- <div class="entry-meta">{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInDays($notice['created_at']) }}</div> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- All Notice Area End Here -->
    </div>
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by
            <a href="#">PsdBosS</a></div>
    </footer>
</div>

@endsection