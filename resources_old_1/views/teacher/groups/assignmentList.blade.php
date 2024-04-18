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


  {{-- @if (\Session::has('status'))

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! \Session::get('status') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  @endif --}}
  @if (\Session::has('success'))

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! \Session::get('success') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  @endif
  <!-- Breadcubs Area End Here -->
  <!-- Student Table Area Start Here -->
  <div class="float-right item-title">
    <button type="button" class="btn btn-primary btn-lg " style="width: 30%" data-toggle="modal"
      data-target="#assignment">
      Add Assignment
    </button>
  </div>

  <br>
  <div class="container">
    <div class="row" style="min-height: 100vh;">
      @foreach($assignment as $assign)
      <div class="col-lg-4" style="height: fit-content;">
        <div class="card card-margin">
          <div class="card-header no-border d-flex justify-content-center pt-5">
            <h5 class="card-title">{{ $assign->subject }}</h5>
          </div>
          <div class="card-body pt-0">
            <div class="widget-49">
              <div class="widget-49-title-wrapper d-flex justify-content-between">
                {{-- <div class="widget-49-date-primary">
                  <span class="widget-49-date-day">{{ $assign->day }}</span>
                  <span class="widget-49-date-month">{{ $assign->month }}</span>
                </div> --}}
                <div class="widget-49-meeting-info px-4 py-1" style="border-bottom: 1px solid #007BFF">
                  <span class="widget-49-pro-title">Assigned On</span>
                  <span class="widget-49-meeting-time text-dark">{{ date('d-M-Y', strtotime($assign->fullDate)) }}</span>
                </div>
                <div class="widget-49-meeting-info px-4 py-1" style="border-bottom: 1px solid #DC3545">
                  <span class="widget-49-pro-title">Due Date</span>
                  <span class="widget-49-meeting-time text-dark">{{ date('d-M-Y', strtotime($assign->dueDate)) }}</span>
                </div>
              </div>
              <ol class="widget-49-meeting-points py-2">
                <li class="widget-49-meeting-item"><span>{{ $assign->assignment }}</span></li>
                <!-- <li class="widget-49-meeting-item"><span>Data migration is in scope</span></li>
                        <li class="widget-49-meeting-item"><span>Session timeout increase to 30 minutes</span></li> -->
              </ol>
            </div>
            <div class="">
              <a href="{{ route('teacher.edit.assignment', $assign->id) }}" class="btn btn-block btn-primary">Edit</a>
            </div>
            <div class="mt-3">
              <a href="{{ route('teacher-delete-assignment', $assign->id) }}" class="btn btn-block btn-danger">Delete</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <footer class="footer-wrap-layout1">
      <div class="copyright">Designed and Developed by Quantum IT Innovation</div>
    </footer>
  </div>

  <!-- Student Table Area End Here -->
</div>
<!-- Modal -->
<div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
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
            <input type="text" class="form-control form-control-sm mb-3" id="subject" name="subject"
              placeholder="Enter subject name..." required>
          </div>

          <div class="form-group">
            <label for="assignment">Assignment Description</label>
            <textarea name="assignment" class="form-control" id="assignment" cols="30" rows="10" required></textarea>
          </div>
          <div class="form-group">
            <label>Due Date</label>
            <input type="date" placeholder="mm/dd/yyyy" name="dueDate" class="form-control air-datepicker"
              data-position='bottom right'>
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