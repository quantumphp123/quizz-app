@extends('parent.layout.layout')

@section('title','Parent-Points History')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Points History</h3>
        <ul>
            <li>
                <a href="{{url('parent/dashboard')}}">Home</a>
            </li>
            <li>Points History</li>
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
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <h3>Points History</h3>
                <div class="item-title">                 
                        @php
                            $total = 0;
                            foreach ($data as $point) {
                                if ($point->total == 12) {
                                    $total += 31250;
                                }
                            }
                        @endphp
                        <h5>Total&nbsp;:&nbsp;{{ $total }}</h5>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table display text-nowrap">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($data as $point)
                        <tr>
                            <td>{{ date('d-M-Y', strtotime(\Carbon\Carbon::parse($point->created_at)->startOfWeek())) }}</td>
                            <td>{{ date('d-M-Y', strtotime(\Carbon\Carbon::parse($point->created_at)->endOfWeek())) }}</td>
                            <td>
                            @if ($point->total == 12)
                                31250
                            @else
                                0
                            @endif
                            </td>
                            <td><a href="{{ route('parent.weekly.points', [$point->studentId, $point->created_at]) }}" role="button" class="btn btn-primary">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>

                    </table>
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
