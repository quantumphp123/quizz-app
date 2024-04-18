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

    <!-- {{ request()->groupId }} -->
    {{-- @if (\Session::has('status'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! \Session::get('status') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @endif --}}
    @if (\Session::has('err_msg'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! \Session::get('err_msg') !!}
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
                <b>Add or View Students</b>
                <div class="item-title float-right"> 
                    <button type="button"  class="btn btn-lg btn-primary" data-toggle="modal" data-target="#addMember">
                       Add Member
                      </button> 
                </div>
            </div>
            <input type="hidden" value="{{$students[0]->class}}" id="class">
            
            <div class="kids-details-wrap">
                <div class="row">
                    @foreach($students as $kid)
                            <div class="col-12-xxxl col-xl-6 col-12">
                                <div class="kids-details-box mb-5">
                                    <div class="item-img">
                                        <img src="{{ url('public/uploads/students/'.$kid->profilePic) }}" alt="kids" style="height:98px;width:98px;border-radius:10px;margin-left: auto;margin-right: auto;display: block;">
                                    </div>

                                    <div class="item-content table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>User ID:</td>
                                                    <td>{{ $kid->userId }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Name:</td>
                                                    <td>
                                                        <a href="{{route('teacher.student.details',$kid->id)}}">
                                                            {{ $kid->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Gender:</td>
                                                    <td>{{ $kid->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Class:</td>
                                                    <td>{{ $kid->class }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button type="button"  class="btn btn-lg btn-success" data-toggle="modal" data-target="#feedback{{$kid->id}}">
                                                            Feedback
                                                           </button> 
                                                        <a href="{{ route('teacher.assign.points',['groupId' => $groupId, 'studentId' => $kid->id]) }}">
                                                          <button type="button"  class="btn btn-lg btn-success">
                                                              Assign Points
                                                          </button> 
                                                        </a>
                                                     
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('teacher.remove.group.member',$kid->id) }}">
                                                            <button class="btn btn-danger btn-lg" onclick="alert('Are you sure?')">Remove</button>
                                                         </a>
                                                    </td>

    

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="feedback{{$kid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Send Feedback to {{$kid->name}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                            
                                        <form action="{{ route('teacher.student.feedback') }}" method="post">
                                          @csrf
                            
                                          <input type="hidden" value="{{$kid->id}}" name="studentId">
                            
                                          <label for="title">Feedback Title</label>

                                              <input type="text" class="form-control mb-3" name="title" id="title" required>
                            
                                              <label for="description">Feedback Description (Optional)</label>

                                            <textarea class="form-control" name="description" id="description" cols="30" rows="8" placeholder="Write about student..."></textarea>
                                  
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-primary mt-3">Send</button>
                                        </div>
                                        </form>
                                    </div>
                            
                                  </div>
                                </div>
                              </div>






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



<div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('teacher.add.group.member') }}" method="post">
              @csrf

              <input type="hidden" value="{{$students[0]->groupId}}" name="groupId">

              <label for="select_students">Select Students</label>
                <select name="students[]" class="form-control form-control-sm select" id="select_students" multiple="multiple" style="width: 100%"  required>
                  
                </select>

      
            <div class="form-group">
              <button type="submit" class="btn btn-primary mt-3">Add</button>
            </div>
            </form>
        </div>

      </div>
    </div>
  </div>





@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script>



        $(document).ready(function(){



                var classValue=$('#class').val();
                
               $.ajax({
                    type:'GET',
                    url:'{{ url("teacher/fetchStudents") }}/' + classValue,
                    success:function(data) {
                        $("#select_students").html(data);
                    }
                    });

                                
                    $(".select").select2({

                    });


         });



    </script>
@endsection
