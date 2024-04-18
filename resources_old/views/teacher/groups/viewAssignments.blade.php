@extends('teacher.layout.layout')

@section('title','Teacher-Assign Points')

@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endsection
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Assignments</h3>
        <ul>
            <li>
                <a href="{{url('teacher/dashboard')}}">Home</a>
            </li>
            <li>Assignments</li>
        </ul>
    </div>


@if (\Session::has('status'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! \Session::get('status') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @endif
    <!-- Breadcubs Area End Here -->
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">

                <h3>Assignments</h3>

            </div>

            <div class="kids-details-wrap">
                <div class="row">
                    @php
                        $i=1;
                    @endphp
                    @foreach($assignments as $assignment)
                            <div class="col-12-xxxl col-xl-6 col-12 border">
                                <div class="kids-details-box mb-5 mt-5">
    

                                    <h4>Subject: ({{$assignment->subject}})</h4>
                                    <h4>Assignment:</h4><p>{{$assignment->assignment}}</p>
                                    {{-- {{}} --}}

                                    {{-- <div class="item-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Subject</th>
                                                    <th>Assignment</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{ $assignment->subject }}</td>
                                                    <td>
                                                        {{ $assignment->assignment }}
                                                    </td>
                                                </tr>
        
                                        @php
                                            $i++;
                                        @endphp

                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>

                            <hr>

                    @endforeach
                    
                </div>
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

