@extends('parent.layout.layout')

@section('title','Parent::Teacher Feedback')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Feedbacks</h3>
        <ul>
            <li>
                <a href="{{url('parent/dashboard')}}">Home</a>
            </li>
            <li>Feedbacks</li>
        </ul>
    </div>
   
    <!-- Breadcubs Area End Here -->

    @if(session()->has('err_msg'))
    <div class="mb-3 alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('err_msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
     @php 
        session()->forget('err_msg')
     @endphp
     {{-- <a href="{{ url()->previous() }}">
        <button class="btn-danger btn btn-lg btn-outline mb-2" style="width: 10%">Back</button>
     </a> --}}
     <!-- Student Table Area Start Here -->


     <div class="col-xl-12 col-7-xxxl col-12">
        <div class="card dashboard-card-six">
            <div class="card-body">
                @if (count($feedbacks) != 0)
                <div class="heading-layout1 mg-b-17">
                    <div class="item-title">
                        <h3>Feedbacks of {{ ucwords($feedbacks[0]->name) }}</h3>
                    </div>
                    {{-- <div class="dropdown">
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
                    </div> --}}
                </div>
                <div class="notice-box-wrap m-height-660">
                    @foreach ($feedbacks as $feedback)
                        
                    
                    <div class="notice-list">
                        <div class="post-date text-dark" style="background-color: {{ $feedback->hex }};">{{ date('d-M-Y', strtotime($feedback->created_at)) }}</div>
                        <h4 class="notice-title">{{$feedback->title}}</h4>
                        <h6 class="notice-title">{{$feedback->description}}</h6>
                        <div class="entry-meta"> {{$feedback->name}} / <span>{{  \Carbon\Carbon::parse($feedback->created_at)->diffForHumans() }}</span></div>
                    </div>

                    @endforeach

                </div>
                @else
                <h5>No Feedbacks</h5>
                @endif
            </div>
        </div>
    </div>


  
    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
</div>


@endsection
