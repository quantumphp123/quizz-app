@extends('admin.layout.layout')
@section('title','Admin-All Parents')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parents</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>All Parents</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>All Parents Data</h3>
                    
                </div>
                <a href="{{route('admin.add.parent')}}" class="float-right"><button class="btn btn-primary">Add Parent</button></a>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>
                                {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkAll">
                                    <label class="form-check-label">ID</label>
                                </div> --}}
                                S.No
                            </th>
                         
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>Gender</th>
                            <th>Occupation</th>
                            <th>Address</th>
                            <th>Religion</th> --}}
                            <th>Contact</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parents as $parent)
                            
                       
                        <tr>
                            @php
                                $i = 1
                            @endphp
                            {{-- <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label">{{$parent->id}}</label>
                                </div>
                            </td> --}}
                            <td>{{ $i }}</td>
                            <td>{{$parent->name}}</td>
                            <td>{{$parent->email}}</td>
                            <td>{{$parent->contact_number}}</td>
                            {{-- <td>{{$parent->gender}}</td>
                            <td>{{$parent->occupation}}</td>
                            <td>{{$parent->address}}</td>
                            <td>{{$parent->contact}}</td>
                            <td>{{$parent->religion}}</td> --}}
                           
                            {{-- <td><a href="parents-details.html"><button class="btn btn-primary btn-lg">Show</button></a></td>
                            <td>
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
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Teacher Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
</div>
    
@endsection