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
    <div class="card text-center">
        <div class="card-header bg-primary text-white">
          ASSIGNMENTS
        </div>
        <div class="container mt-4">
          <div class="row">
            @foreach($assignments as $assignment)
            <div class="col-lg-4">
              <div class="card card-margin">
                <div class="card-header no-border d-flex justify-content-center pt-4" style="background-image: linear-gradient(to bottom, #1284fd, #67aefa);">
                  <h5 class="card-title">{{ $assignment->subject }}</h5>
                </div>
                <div class="card-body pt-0">
                  <div class="widget-49">
                    <div class="widget-49-title-wrapper d-flex justify-content-between mt-2">
                      {{-- <div class="widget-49-date-primary">
                        <span class="widget-49-date-day">{{ $assignment->day }}</span>
                        <span class="widget-49-date-month">{{ $assignment->month }}</span>
                      </div> --}}
                      <div class="widget-49-meeting-info px-4 py-1" style="border-bottom: 1px solid #007BFF">
                        <span class="widget-49-pro-title text-dark" style="font-weight: bold;">Assigned On</span>
                        <span class="widget-49-meeting-time text-dark">{{ date('d-M-Y', strtotime($assignment->created_at)) }}</span>
                      </div>
                      <div class="widget-49-meeting-info px-4 py-1" style="border-bottom: 1px solid #DC3545">
                        <span class="widget-49-pro-title text-dark" style="font-weight: bold;">Due Date</span>
                        <span class="widget-49-meeting-time text-dark">{{ date('d-M-Y', strtotime($assignment->dueDate)) }}</span>
                      </div>
                    </div>
                    <ol class="widget-49-meeting-points py-2 mt-2">
                      <li class="widget-49-meeting-item"><span>{{ $assignment->assignment }}</span></li>
                      <!-- <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                              <li class="widget-49-meeting-item"><span>Session timeout increase to 30 minutes</span></li> -->
                    </ol>
                  </div>
                  {{-- <div class="">
                    <a href="{{ route('teacher.edit.assignment', $assignment->id) }}" class="btn btn-block btn-primary">Edit</a>
                  </div>
                  <div class="mt-3">
                    <a href="{{ route('teacher-delete-assignment', $assignment->id) }}" class="btn btn-block btn-danger">Delete</a>
                  </div> --}}
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        {{-- <div class="card-body">
           
            <div class="row mt-5">
                @foreach ($assignments as $assignmentment)
                    
                
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-header">
                        <h5 class="card-title float-left" style="border-bottom: 1px solid {{ session('hex') }};">Subject&nbsp;&nbsp;{{$assignmentment->subject}}</h5>
                        <h5 class="card-title float-right" style="border-bottom: 1px solid {{ session('hex') }};">Submit to&nbsp;&nbsp;{{ ucwords($assignmentment->name) }}</h5>
                        <h5 class="card-title float-right" style="border-bottom: 1px solid {{ session('hex') }};">Due Date&nbsp;&nbsp;{{ date('d-M-Y', strtotime($assignmentment->dueDate)) }}</h5>
                    </div>
                    <div class="card-body">
                      <p class="card-text">{{$assignmentment->assignment}}</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>

                @endforeach

              </div>

        </div> --}}

    </div>
    {{-- </div> --}}
    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
</div>




@endsection

