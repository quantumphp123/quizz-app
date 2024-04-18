@extends('teacher.layout.layout')

@section('title','Teacher Create New Group')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->

    @if(session()->has('err_msg'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>Error!</strong> {{ session()->get('err_msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="breadcrumbs-area">
        <h3>Teacher Dashboard</h3>
        <ul>
            <li>
                <a href="{{ URL::previous() }}">Home</a>
            </li>
            <li>Create New Group</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard Content Start Here -->
    <div class="row  d-flex align-items-center justify-content-center">
        <div class="col-12-xxxl col-12">
        <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Create New Group</h3>
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
                        <form action="{{ route('teacher.createGroup') }}" method="post">
                            @csrf
                              <div class="form-group">
                                <label for="group_name">Group Name</label>
                                <input type="text" class="form-control form-control-sm mb-3" id="group_name" name="group_name" placeholder="Enter group name..." required>
                              </div>
                              <div class="form-group">
                                <label for="select_class">Select Class</label>
              
                                <select name="class" class="form-control mb-3" id="select_class" onchange="return fetchStudentsList()" required>
                                      <option value="">Select Class</option>
                                      @foreach($classes as $class)
                                          <option value="{{ $class['class'] }}">{{ $class['class'] }}</option>
                                      @endforeach
                                </select>
                              </div>
              
              
              
                            <label for="select_students">Select Students</label><br>
                            <label class="font-italic">Use CTRL + Left Click to Select Multiple Students</label>
                              <select name="students[]" size="5" class="form-control form-control select" id="select_students" multiple="multiple" style="width: 100%" required>
                              </select>
              
                    
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                          </div>
                          </form>
                    </div>
                </div>
        </div>
        
    </div>
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a>
        </div>
    </footer>
    <!-- Dashboard Content End Here -->
</div>
    
@endsection