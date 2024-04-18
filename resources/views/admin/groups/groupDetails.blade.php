@extends('admin.layout.layout')

@section('title','Admin-Group-Details')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Group Detail</h3>
        <ul>
            <li>
                <a href="{{route('adminDashboard')}}">Home</a>
            </li>
            <li>Group Detail</li>
        </ul>
    </div>
   
    <!-- Breadcubs Area End Here -->
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                
                <h3>Group Name&nbsp;:&nbsp;{{ $groupName->groupName }}</h3>
                {{-- <h3 class="float-right">Total Points: ({{$totalPoints}})</h3> --}}
                <div class="item-title">                 
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display text-nowrap">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Profile Pic</th>
                            <th>User Id</th>
                            <th>Student Name</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key=>$item)
                            
                      
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{ url('public/uploads/Students/'.$item->profilePic) }}" alt="Unavailable" style="height:100px;width:100px;">
                            </td>
                            <td>{{$item->userId}}</td>
                            <td>{{ ucwords($item->name) }}</td>
                            <td>{{$item->class}}</td>
                           
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
