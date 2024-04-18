@extends('parent.layout.layout')

@section('title','Parent-My Profile')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>My Profile</h3>
        <ul>
            <li>
                <a href="{{route('parent.dashboard')}}">Home</a>
            </li>
            <li>My Profile</li>
        </ul>
    </div>


    @if(session('status'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{  session()->forget('status');}}
    @endif


    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>About Me</h3>
                </div>
               <!-- <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" 
                    data-toggle="dropdown" aria-expanded="false">...</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                    </div>
                </div> -->
            </div>
            <div class="single-info-details">
                <div class="item-img">
                    
                    <img src="{{$details->profile_pic}}" alt="student" style="width:280px;height:330px">
                </div>
                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">Details</h3>
                        <div class="header-elements">
                            <ul>
                                <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateProfile"><i class="far fa-edit"></i></button>
                              </li>
                                
                                  
{{-- 

                                <li><a href="#"><i class="fas fa-print"></i></a></li>
                                <li><a href="#"><i class="fas fa-download"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                    {{-- <p>Aliquam erat volutpat. Curabiene natis massa sedde lacu stiquen sodale 
                    word moun taiery.Aliquam erat volutpaturabiene natis massa sedde  sodale 
                    word moun taiery.</p> --}}
                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td class="font-medium text-dark-medium">{{$details->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td class="font-medium text-dark-medium">{{$details->email}}</td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td class="font-medium text-dark-medium">{{$details->contact}}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td class="font-medium text-dark-medium">{{$details->gender}}</td>
                                </tr>
                                <tr>
                                    <td>Date Of Birth:</td>
                                    <td class="font-medium text-dark-medium">{{$details->dob}}</td>
                                </tr>
                                <tr>
                                    <td>Religion:</td>
                                    <td class="font-medium text-dark-medium">{{$details->religion}}</td>
                                </tr>
                                <tr>
                                    <td>Occupation:</td>
                                    <td class="font-medium text-dark-medium">{{$details->occupation}}</td>
                                </tr>

                                <tr>
                                    <td>Address:</td>
                                    <td class="font-medium text-dark-medium">{{$details->address}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <hr>
            <div class="item-title">
                <h3>Past Quizzes</h3>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkAll">
                                    <label class="form-check-label">Roll</label>
                                </div>
                            </th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Quiz Name</th>
                            <th>Marks Obtained</th>
                            <th>Total Marks</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label">#0021</label>
                                </div>
                            </td>
                            <td class="text-center"><img src="img/figure/student2.png" alt="student"></td>
                            <td>Mark Willy</td>
                            <td>Environmental Science 2</td>
                            <td>20</td>
                            <td>25</td>
                            <td>2022-09-13</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label">#0021</label>
                                </div>
                            </td>
                            <td class="text-center"><img src="img/figure/student2.png" alt="student"></td>
                            <td>Mark Willy</td>
                            <td>Environmental Science 2</td>
                            <td>20</td>
                            <td>25</td>
                            <td>2022-09-13</td>
                        </tr>
                        

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Student Details Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
    </footer>
</div>




<div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('parent.update.profile')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label for="group_name">Name</label>
                  <input type="text" class="form-control form-control-sm mb-3" name="name" value="{{$details->name}}">
                </div>

                <div class="form-group">
                  <label for="group_name">Email</label>
                  <input type="email" class="form-control form-control-sm mb-3" name="email" value="{{$details->email}}">
                </div>
                
                <div class="form-group">
                  <label for="group_name">Contact</label>
                  <input type="text" class="form-control form-control-sm mb-3" name="contact" value="{{$details->contact}}">
                </div>
  
                <div class="form-group">
                  <label for="group_name">Profile Picture</label>
                  <input type="file" class="form-control form-control-sm mb-3" name="profile_pic">
                </div>
  
                <div class="form-group">
                  <label for="group_name">Contact</label>
                  <input type="text" class="form-control form-control-sm mb-3" name="contact" value="{{$details->contact}}">
                </div>
  


                <div class="form-group">
                  <label for="group_name">Select Gender</label><br>
                <select name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer not to say</option>
                </select>
                </div>

                <div class="form-group">
                  <label for="group_name">Date of Birth</label>
                  <input type="date" class="form-control form-control-sm mb-3" name="dob" value="{{$details->dob}}">
                </div>
                
                <div class="form-group">
                  <label for="group_name">Religion</label>
                  <input type="text" class="form-control form-control-sm mb-3" name="religion" value="{{$details->religion}}">
                </div>
  
                <div class="form-group">
                  <label for="group_name">Occupation</label>
                  <input type="text" class="form-control form-control-sm mb-3" name="occupation" value="{{$details->occupation}}">
                </div>
                
                <div class="form-group">
                  <label for="group_name">Address</label>
                  <input type="text" class="form-control form-control-sm mb-3" name="address" value="{{$details->address}}">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>

      </div>
    </div>
  </div>
    



@endsection
