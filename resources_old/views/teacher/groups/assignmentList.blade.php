@extends('teacher.layout.layout')

@section('title','Teacher-Assignment')

@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endsection
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    
    <div class="breadcrumbs-area">
        <h3>Assignment</h3>
        <ul>
            <li>
                <a href="{{url('teacher/dashboard')}}">Home</a>
            </li>
            <li>Assignment</li>
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
    <div class="float-right item-title">
        <button type="button" class="btn btn-primary btn-lg " style="width: 30%" data-toggle="modal" data-target="#assignment">
            Add Assignment
        </button>
    </div>
     
    <br>
    <div class="container">
<div class="row">
    @foreach($assignment as $assign)
    <div class="col-lg-4">
        <div class="card card-margin">
            <div class="card-header no-border">
                <h5 class="card-title"></h5>
            </div>
            <div class="card-body pt-0">
                <div class="widget-49">
                    <div class="widget-49-title-wrapper">
                        <div class="widget-49-date-primary">
                            <span class="widget-49-date-day">{{ $assign->day }}</span>
                            <span class="widget-49-date-month">{{ $assign->month }}</span>
                        </div>
                        <div class="widget-49-meeting-info">
                            <span class="widget-49-pro-title">{{ $assign->subject }}</span>
                            <span class="widget-49-meeting-time">{{ $assign->fullDate }}</span>
                        </div>
                    </div>
                    <ol class="widget-49-meeting-points">
                        <li class="widget-49-meeting-item"><span>{{ $assign->assignment }}</span></li>
                        <!-- <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                        <li class="widget-49-meeting-item"><span>Session timeout increase to 30 minutes</span></li> -->
                    </ol>
                    <div class="widget-49-meeting-action">
                        <a href="#" class="btn btn-sm btn-flash-border-primary">More...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">Designed and Developed by Quantum IT Innovation</div>
    </footer>
</div>
 <!-- Modal -->
 <div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Assignment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('teacher.assign.assignment') }}" method="post">
              @csrf
              
              <input type="hidden" name="groupId" value="{{ $groupId }}">
                <div class="form-group">
                  <label for="subject">Assignment Title</label>
                  <input type="text" class="form-control form-control-sm mb-3" id="subject" name="subject" placeholder="Enter subject name..." required>
                </div>

                <div class="form-group">
                  <label for="assignment">Assignment Description</label>
                   <textarea name="assignment" class="form-control" id="assignment" cols="30" rows="10" required></textarea>
                </div>

      
            <div class="form-group">
              <button type="submit" class="btn btn-primary mt-3">Assign</button>
            </div>
            </form>
        </div>

      </div>
    </div>
  </div>


@endsection


@section('scripts')


@endsection
