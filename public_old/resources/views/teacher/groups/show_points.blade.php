@extends('teacher.layout.layout')

@section('title','Teacher-Points History')
    
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
     <a href="{{ url()->previous() }}">
        <button class="btn-danger btn btn-lg btn-outline mb-2" style="width: 10%">Back</button>
     </a>
     <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <h3>Total Points: ({{$totals}})</h3>
                <div class="item-title">                 
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table display text-nowrap">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Parameters</th>
                            <th>Points (Out of 10)</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($details as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->reason}}</td>
                            <td>{{$item->point}}</td>
                        </tr>
              @endforeach
                    </tbody>

                    <tfoot>
                            <th>Date</th>
                            <th>Parameters</th>
                            <th>Points (Out of 10)</th>
                    </tfoot>
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
