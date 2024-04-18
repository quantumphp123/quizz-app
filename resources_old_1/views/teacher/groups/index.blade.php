@extends('teacher.layout.layout')

@section('title','Teacher-Groups')

@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endsection

@section('content')


<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Groups</h3>
        <ul>
            <li>
                <a href="{{ url('teacher/dashboard') }}">Home</a>
            </li>
            <li>Groups</li>
        </ul>
    </div>
   
    <!-- Breadcubs Area End Here -->
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">

        @if(session('err_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('err_msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          {{ session()->forget('err_msg') }}
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
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
        @if (\Session::has('status') && session('status') != "Points Assigned Successfully")

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! \Session::get('status') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
          @endif


        <div class="card-body">
            <div class="heading-layout1">
                <h3>All Groups</h3>
                <div class="item-title">
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createGroup">
                        Create Group
                      </button>                   --}}
                    <a href="{{ route('create.group') }}" role="button" class="btn btn-primary">
                        Create Group
                    </a>                  
                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Group Name</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i=1; ?>
                        @foreach($data as $rows)
                        <tr>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                {{ $rows->groupName }}
                            </td>
                            <td>
                                {{ $rows->class }}
                            </td>
                            <td>
                              <a href="{{route('teacher.group.show',$rows->id)}}"><button class="btn btn-primary">Group Details</button></a>
                              <a href="{{ route('teacher.group.delete', $rows->id) }}" class="btn-del"><button class="btn btn-danger">Delete Group</button></a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp




         <!-- Modal -->
  <div class="modal fade" id="assignment{{$rows->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('teacher.assign.assignment') }}" method="post">
              @csrf
              
              <input type="hidden" name="groupId" value="{{$rows->id}}">
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control form-control-sm mb-3" id="subject" name="subject" placeholder="Enter subject name..." required>
                </div>

                <div class="form-group">
                  <label for="assignment">Assignment</label>
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
                        @endforeach 
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Group Name</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
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
    


  
  <!-- Modal -->
  {{-- <div class="modal fade" id="createGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

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
                        @foreach($class as $classes)
                            <option value="{{ $classes->class }}">{{ $classes->class }}</option>
                        @endforeach
                  </select>
                </div>



              <label for="select_students">Select Students</label>
                <select name="students[]" class="form-control form-control-sm select" id="select_students" multiple="multiple" style="width: 100%" required>
                  
                </select>

      
            <div class="form-group">
              <button type="submit" class="btn btn-primary mt-3">Create</button>
            </div>
            </form>
        </div>

      </div>
    </div>
  </div> --}}
    
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    
      $(document).ready(function(){

        $(".select").select2({

        });


        
      });
</script>
<script>
  let btnDel = document.querySelectorAll('.btn-del')
  Array.from(btnDel).forEach(btn => {
    btn.addEventListener('click', (e)=> {
      let con = confirm("Are You Sure?")
      if (con == false) {
        e.preventDefault()
      }
    })
  })
</script>
    
@endsection