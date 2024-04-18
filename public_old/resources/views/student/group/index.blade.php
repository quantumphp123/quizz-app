@extends('student.layout.layout')

@section('title','Student::My Group')

@section('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endsection
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>My Group</h3>
        <ul>
            <li>
                <a href="{{route('student.dashboard')}}">Home</a>
            </li>
            <li>My Group</li>
        </ul>
    </div>


@if (\Session::has('status'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! \Session::get('status') !!}
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
                <h3>Group&nbsp;Name&nbsp;:&nbsp;{{ $groupDetails[0]->groupName }}</h3>
            {{-- <h3 class="float-right">Total&nbsp;Points&nbsp;:&nbsp;<a href="#">{{ $totalPoints }}</a></h3> --}}
            </div>


            <div class="kids-details-wrap">
                <div class="row">
                    @foreach($groupDetails as $kid)
                            <div class="col-12-xxxl col-xl-6 col-12">
                                <div class="kids-details-box mb-5">
                                    <div class="item-img">
                                        <img src="{{ url('public/uploads/Students/'.$kid->profilePic) }}" alt="kids" style="height:98px;width:98px;border-radius:50%;">
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
                                                           
                                                        <a href="#">
                                                            {{ ucwords($kid->name) }} 
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
                                      
                                            </tbody>
                                        </table>
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




@endsection
