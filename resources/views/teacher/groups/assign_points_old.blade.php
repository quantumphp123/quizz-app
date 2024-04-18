@extends('teacher.layout.layout')

@section('title','Teacher-Assign Points')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Assign Points</h3>
        <ul>
            <li>
                <a href="{{url('teacher/dashboard')}}">Home</a>
            </li>
            <li>Assign Points</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
     @php 
        session()->forget('err_msg')
     @endphp
     <a href="{{ url()->previous() }}">
        <button class="btn-danger btn btn-lg btn-outline mb-2" style="width: 10%">Back</button>
     </a>
     @if (session()->has('errors'))
        @foreach (session('errors') as $error)
            <p class="text-danger">{{ '* '. $error }}</p>
        @endforeach
     @endif
     @if (session()->has('status'))
         <p class="text-success">{{ session('success') }}</p>
     @endif
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">

                <div class="item-title">
                    <h3>Group Name : {{$group->groupName}}</h3>
                    <h3>Student Name : {{$student->name}}</h3>
                </div>
            </div>

            {{-- <div class="float-right">
                <input class="form-check-input" type="checkbox" value="" id="checkAll">
                <label class="form-check" for="checkAll">
                    Check to select all
                </label>
            </div> --}}

            <form action="{{url('teacher/post-assign-points')}}" method="post">
                @csrf
                <div class="table-responsive">
                    @if (count($points_by_teacher) != 0)
                        <h5>You Already Assigned Points</h5>
                    @else
                    <table class="table display text-nowrap">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Parameters</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $params = ['punctual', 'discipline', 'respectful', 'contributing', 'organized',
                            'performing', 'responsible', 'co-operative', 'leadership', 'determined', 'self confident',
                            'obedient'];
                            @endphp
                            @for ($i = 0; $i < count($params); $i++) <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ ucwords($params[$i]) }}</td>
                                <td>
                                    <select name="{{ $params[$i] }}" class="form-control" style="width: 50%;">
                                        <option value="0" selected>Choose Yes or No</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                    @endif
                    <input type="hidden" name="groupId" value="{{$group->id}}">
                    <input type="hidden" name="studentId" value="{{$student->id}}">
                </div>
@if (count($points_by_teacher) == 0)
<button class="btn btn-primary" type="submit" style="font-size:20px;margin-left:40%">Assign</button>
@endif
            </form>
        </div>
    </div>
    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">Designed and Developed by Quantum IT Innovation</div>
    </footer>
</div>


@endsection

@section('scripts')

<script>
    $(document).ready(function(){

                    console.log($('.point_value').length);

                    if( $( "input:checked")){

                        
                        $('.point_value').val(10);


                    }

                    else{
                        $('.point_value').val();
                        
                    }
                      


                });
</script>

@endsection