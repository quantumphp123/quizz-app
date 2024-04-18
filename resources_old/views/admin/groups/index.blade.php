@extends('admin.layout.layout')

@section('title','Admin-Groups')
    
@section('content')


<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Groups</h3>
        <ul>
            <li>
                <a href="{{url('admin/dashboard')}}">Home</a>
            </li>
            <li>Groups</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>All Groups</h3>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkAll">
                                    <label class="form-check-label">Sr.No.</label>
                                </div>
                            </th>
                            {{-- <th>Photo</th> --}}
                            <th>Group Name</th>
                            {{-- <th>Gender</th> --}}
                            <th>Class</th>

                            <th>Created By</th>
                           {{--  <th>Parents</th>
                            <th>Address</th>
                            <th>Date Of Birth</th>
                            <th>Phone</th> --}}
                            {{-- <th>E-mail</th> --}}
                            <th>Action</th>
                            {{-- <th>Status</th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $key=>$item)
                            
                        
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label">{{$key+1}}</label>
                                </div>
                            </td>
                            {{-- <td class="text-center"><img src="{{url('assets/admin/img/figure/student2.png')}}" alt="student"></td> --}}
                            <td>{{$item->groupName}}</td>
                            <td>{{$item->class}}</td>
                        
                            <td>{{$item->teacherName}}</td>
                            {{-- <td>2</td>
                            <td>A</td>
                            <td>Jack Sparrow </td>
                            <td>TA-107 Newyork</td>
                            <td>02/05/2001</td>
                            <td>+ 123 9988568</td>
                            <td>kazifahim93@gmail.com</td> --}}
                            <td><a href="{{route('admin.show.group.details',$item->id)}}"><button class="btn btn-primary btn-lg">Show</button></a></td>
                            {{-- <td>
                                <div class="form-check form-switch form-check">
                                    <input class="form-check-input form-control" type="checkbox" id="">
                                    <label class="form-check-label" for="">Active</label>
                                </div>
                            </td> --}}
                            {{-- <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <span class="flaticon-more-button-of-three-dots"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-times text-orange-red"></i>Close</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                    </div>
                                </div>
                            </td> --}}
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
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
    

    
@endsection