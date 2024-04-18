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
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table display text-nowrap">
                    <thead>
                        <tr>
                            <th>Parameters</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($data as $rows)
                        <tr>
                            {{-- <td>{{ date('d-M-Y', strtotime($rows->created_at)) }}</td> --}}
                            <td>{{ ucwords($rows->reason) }}</td>
                            <td>
                                @if ($rows->point == true)
                                    Yes
                                @else
                                    No<br>
                                    <p class="mb-0">{{ $rows->comment }}</p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                            <th>Parameters</th>
                            <th>Points</th>
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
