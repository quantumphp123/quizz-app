@extends('teacher.layout.layout')

@section('title','Teacher-Assign Points')

@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endsection
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Group Detail</h3>
        <ul>
            <li>
                <a href="{{url('teacher/dashboard')}}">Home</a>
            </li>
            <li>Group Detail</li>
        </ul>
    </div>


    @if (\Session::has('status') && session('status') != "Points Assigned Successfully")

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! \Session::get('status') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @endif
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
    <div class="card height-auto">
        <div class="card-body">
            <!-- <div class="heading-layout1">

            </div> -->
            <div class="row">
                    @if (!$students->isEmpty())
                    <div class="col">
                      <div class="card" style="">
                      <img class="card-img-top" src="https://st2.depositphotos.com/1004274/8297/v/450/depositphotos_82971018-stock-illustration-check-list-icon-business-concept.jpg" alt="Card image cap" style="width: 286px; height: 180px;">
                        <div class="card-body">
                          <h5 class="card-title">Assignments</h5>
                          <h6 class="card-subtitle mb-2 text-muted">Add or View Assignment</h6>
                          <p class="card-text">Manage and Assign task to whole Group at once</p>
                          <a href="{{ route('teacher.assignment', ['groupId' => $students[0]->groupId]) }}" class="card-link"><button class="btn btn-lg btn-outline-success " style="width: 18rem">Go!</button></a>
                        </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="card" style="">
                        <img class="card-img-top" src="https://img.freepik.com/premium-vector/success-student-consulting_7109-29.jpg" alt="Card image cap" style="width: 286px; height: 180px;">
                        <div class="card-body">
                          <h5 class="card-title">Add or View Students</h5>
                          <h6 class="card-subtitle mb-2 text-muted">Add or View Students in Group</h6>
                          <p class="card-text">See Group participants and assign Rewards points.</p>
                          <a href="{{ route('teacher.group.students', ['groupId' => $students[0]->groupId]) }}" class="card-link"><button class="btn btn-lg btn-outline-success " style="width: 18rem">Go!</button></a>
                        </div>
                      </div>
                  </div>
                  @else
                  <div class="col">
                    <div class="card" style="">
                      <h4 class="text-center">No Student In the Group</h4>
                      </div>
                      </div>
                    @endif
                </div>
                <!-- row ends -->

        </div>
    </div>
    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">Designed and Developed by Quantum IT Innovation</div>
    </footer>
</div>

@endsection


@section('scripts')


@endsection
