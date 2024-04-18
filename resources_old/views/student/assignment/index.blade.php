@extends('student.layout.layout')

@section('title','Student::Assignments')

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
                <a href="{{route('student.dashboard')}}">Home</a>
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


    <div class="container">
      <div class="row">
          @foreach($assignments as $assign)
          <div class="col-lg-4">
              <div class="card card-margin">
                  <div class="card-header no-border">
                      <h5 class="card-title"></h5>
                  </div>
                  <div class="card-body pt-0">
                      <div class="widget-49">
                          <div class="widget-49-title-wrapper">
                              <div class="widget-49-date-primary mb-5">
                                 <span class="widget-49-date-day">{{\Carbon\Carbon::parse($assign->created_at)->format('d');}}</span>
                                 <span class="widget-49-date-month">{{ \Carbon\Carbon::parse($assign->created_at)->format('F'); }}</span>
                              </div>
                              <div class="widget-49-meeting-info">
                                <h5 class="float-right mb-5">Submit To: {{$assign->name}}</h5>

                                <h5 class="widget-49-pro-title float-right">{{ $assign->subject }}</h5>
                              
                                  {{-- <span class="widget-49-meeting-time">{{ $assign->fullDate }}</span> --}}
                              </div>
                          </div>
                          <ol class="widget-49-meeting-points">
                              <li class="widget-49-meeting-item"><span>{{ $assign->assignment }}</span></li>
                              <!-- <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                              <li class="widget-49-meeting-item"><span>Session timeout increase to 30 minutes</span></li> -->
                          </ol>
                          <div class="widget-49-meeting-action">

                            <h6>Due Date: {{$assign->dueDate}}</h6>

                        </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
      </div>





    {{-- </div> --}}
    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
</div>




@endsection

