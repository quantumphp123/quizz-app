@extends('teacher.layout.layout')

@section('title','Teacher-All Students')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Students</h3>
        <ul>
            <li>
                <a href="{{route('teacher.dashboard')}}">Home</a>
            </li>
            <li>All Students</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Students Data</h3>
                </div>
            </div>
            <form method="get" action="" class="mg-b-20">
                <div class="row gutters-8">
                    <div class="col-4-xxxl col-xl-10 col-lg-10 col-12 form-group">
                        <select name="class" class="form-control ">
                        <option selected disabled>Select class</option>
                        @foreach($className as $item)
                            <option value="{{$item->class}}" >
                                    {{$item->class}}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table display  text-nowrap">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            {{-- <th>Photo</th> --}}
                            <th>Name</th>
                            <th>Gender</th>
                            {{-- <th>Class</th> --}}
                            <th>Class</th>
                            <th>Date of Birth</th>
                            {{-- <th>Address</th>
                            <th>Date Of Birth</th>
                            <th>Phone</th>
                            <th>E-mail</th> --}}
                            <th>Bio</th>
                            <th>Show</th>
                            {{-- <th>Status</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach($class as $details)
                        <tr>
                            <td>{{ $i }}</td>
                            {{-- <td class="text-center"><img src="{{url('assets/teacher/img/figure/student2.png')}}" alt="student"></td> --}}
                            <td>{{ ucwords($details->name) }}</td>
                            <td>{{$details->gender}}</td>
                            <td>{{$details->class}}</td>
                            <td>{{$details->dateOfBirth}}</td>
                            <td>{{$details->bio}}</td>
                            {{-- <td>Jack Sparrow </td>
                            <td>TA-107 Newyork</td>
                            <td>02/05/2001</td>
                            <td>+ 123 9988568</td>
                            <td>kazifahim93@gmail.com</td> --}}
                            <td><a href="{{route('teacher.student.details',$details->id)}}"><button class="btn btn-primary btn-lg">Show</button></a></td>
                            <?php $i++; ?>
                            @endforeach

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">Designed and Developed by QuantumIt Innovation</div>
    </footer>
</div>

@endsection