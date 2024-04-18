@extends('teacher.layout.layout')

@section('title','Teacher-Student Details')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Students</h3>
        <ul>
            <li>
                <a href="{{route('teacher.dashboard')}}">Home</a>
            </li>
            <li>Student Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>About</h3>
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
                    <img src="{{ url('public/uploads/Students/'.$details->profilePic) }}" alt="student" style="width:280px;hight:330px;">
                </div>
                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">Details</h3>
                        <div class="header-elements">
                            {{-- <ul>
                                <li><a href="#"><i class="far fa-edit"></i></a></li>
                                <li><a href="#"><i class="fas fa-print"></i></a></li>
                                <li><a href="#"><i class="fas fa-download"></i></a></li>
                            </ul> --}}
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
                                    <td class="font-medium text-dark-medium">{{ ucwords($details->sName) }}</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td class="font-medium text-dark-medium">{{$details->gender}}</td>
                                </tr>
                                <tr>
                                    <td>Father Name:</td>
                                    <td class="font-medium text-dark-medium">{{ucwords($details->pName)}}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Mother Name:</td>
                                    <td class="font-medium text-dark-medium">Naomi Rose</td>
                                </tr> --}}
                                <tr>
                                    <td>Date Of Birth:</td>
                                    <td class="font-medium text-dark-medium">{{$details->dateOfBirth}}</td>
                                </tr>
                                <tr>
                                    <td>Class:</td>
                                    <td class="font-medium text-dark-medium">{{$details->class}}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Father Occupation:</td>
                                    <td class="font-medium text-dark-medium">Graphic Designer</td>
                                </tr> --}}
                                <tr>
                                    <td>Parent E-mail:</td>
                                    <td class="font-medium text-dark-medium">{{$details->email}}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Admission Date:</td>
                                    <td class="font-medium text-dark-medium">07.08.2019</td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>Class:</td>
                                    <td class="font-medium text-dark-medium">2</td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>Section:</td>
                                    <td class="font-medium text-dark-medium">Pink</td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>Roll:</td>
                                    <td class="font-medium text-dark-medium">10005</td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>Address:</td>
                                    <td class="font-medium text-dark-medium">House #10, Road #6, Australia</td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>Phone:</td>
                                    <td class="font-medium text-dark-medium">+ 88 98568888418</td>
                                </tr> --}}
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
                <table class="table display text-nowrap">
                    <thead>
                        <tr>
                            <th>
                                <label class="form-check-label">Sr.No.</label>
                                {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkAll">
                                    
                                </div> --}}
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
                                <label class="form-check-label">1</label>

                                {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                </div> --}}
                            </td>
                            <td class="text-center"><img src="{{url('assets/teacher/img/figure/student2.png')}}" alt="student"></td>
                            <td>Mark Willy</td>
                            <td>Environmental Science 2</td>
                            <td>20</td>
                            <td>25</td>
                            <td>2022-09-13</td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-check-label">2</label>
                                {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                   
                                </div> --}}
                            </td>
                            <td class="text-center"><img src="{{url('assets/teacher/img/figure/student2.png')}}" alt="student"></td>
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

@endsection