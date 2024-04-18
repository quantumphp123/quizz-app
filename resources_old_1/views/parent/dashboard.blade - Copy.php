@extends('parent.layout.layout')

@section('title','Parent-Dashboard')

@section('content')


<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->

    @csrf

    <div class="breadcrumbs-area">
        <h3>Parent Dashboard</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Parents</li>
        </ul>
    </div>


    @if(session()->has('err_msg'))
    <div class="mb-3 alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('err_msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @php
    session()->forget('err_msg')
    @endphp
    @if (session()->has('success'))
    <div class="mb-3 alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->
    <div class="row">
        {{-- <div class="col-6-xxxl col-sm-6 col-12"> --}}
            {{-- <div class="dashboard-summery-one">
                <div class="row">
                    <div class="col-6">
                        <div class="item-icon bg-light-magenta">
                            <i class="flaticon-shopping-list text-magenta"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Notifications</div>
                            <div class="item-number"><span class="counter" data-num="12">12</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6-xxxl col-sm-6 col-12">
            <div class="dashboard-summery-one">
                <div class="row">
                    <div class="col-6">
                        <div class="item-icon bg-light-yellow">
                            <i class="flaticon-mortarboard text-orange"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Result</div>
                            <div class="item-number"><span class="counter" data-num="16">16</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Dashboard summery End Here -->
        <!-- Dashboard Content Start Here -->

        <div class="row">


            <div class="col-5-xxxl col-6">

                @if (\Session::has('status'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! \Session::get('status') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @endif


                <div class="card dashboard-card-twelve">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>My Kids</h3>
                            </div>
                            <a href="{{ route('parent.addKid', ['parentId' => session()->get('parentId')]) }}">
                                <button class="btn-primary btn btn-lg btn-outline" id="addkid">Add Kid</button>
                            </a>
                        </div>
                        <div class="kids-details-wrap">
                            <div class="row">
                                @foreach($kids as $kid)
                                <div class="col-12-xxxl col-sm-12 col-12">

                                    <div class="kids-details-box mb-5 hover" id="{{ $kid->id }}"
                                        style="background-color: {{ $kid->hex }}">
                                        <div class="item-img">
                                            <img src="{{ url('public/uploads/Students/'.$kid->profilePic) }}" alt="kids"
                                                style="height:98px;width:98px;">
                                        </div>
                                        <div class="item-content table-responsive">
                                            {{-- Feedback Button --}}
                                            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                                                data-target="#feedback{{$kid->id}}">Feedback</button>
                                            <a href="{{route('parent.teacher.feedback', $kid->id)}}" role="button" class="btn btn-primary">
                                                Feedback History
                                            </a>
                                            <a href="{{route('parent.remove.kid', $kid->id)}}" role="button" class="btn btn-danger btn-del-kid">
                                                {{ 'Remove '.ucwordS($kid->name)."'s Account" }}
                                            </a>
                                            <a href="{{route('edit.kid', $kid->userId)}}" role="button" class="btn btn-success">
                                                Edit Account
                                            </a>
                                            <table class="table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>User ID</td>
                                                        <td>{{ $kid->userId }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>
                                                            <a href="#">
                                                                {{ ucwords($kid->name) }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>{{ ucwords($kid->gender) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Class</td>
                                                        <td>{{ $kid->class }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a
                                                                href="{{ route('parent.viewPoints', ['kidId' => $kid->id]) }}">
                                                                <button class="btn btn-success ">View
                                                                    Points</button>
                                                            </a>

                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('parent.assignPoints', ['kidId' => $kid->id]) }}">
                                                                <button class="btn btn-success ">Assign
                                                                    Points</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div id="popover_html" style="display:none;">
                                    <!-- <p><img src="images/p_image" class="img-responsive img-thumbnail" /></p>   -->
                                    <p class="h4"><label>Group Assigned to :</label>g_name</p>
                                    <p class="h4"><label>Points given by Teacher :</label>t_points</p>
                                    <p class="h4"><label>Points given by Parent :</label>p_points</p>
                                </div>


                                <div class="modal fade" id="feedback{{$kid->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Feedback To my child</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('parent.student.feedback') }}" method="post">
                                                    @csrf

                                                    <input type="hidden" value="{{$kid->id}}" name="studentId">

                                                    <label for="title">Title</label>

                                                    <input type="text" class="form-control mb-3" name="title" id="title"
                                                        required>

                                                    <label for="description">Describe</label>

                                                    <textarea class="form-control" name="description" id="description"
                                                        cols="30" rows="8" placeholder="Describe your feedback..."
                                                        required></textarea>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary mt-3">Send Feedback</button>
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
            </div>




            <div class="col-sm-6 col-7-xxxl col-6">
                <div class="card dashboard-card-six" style="height: auto;
            min-height: 20px">
                    <div class="card-body">
                        <div class="heading-layout1 mg-b-17">
                            <div class="item-title">
                                <h3>Recent Notifications</h3>
                            </div>
                            {{-- <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-times text-orange-red"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="pb-5">
                            @foreach ($kids as $kid)
                            <a href="{{ route('student-notifies', $kid->id) }}" role="button" class="btn px-4 py-2 mr-3" style="background-color: {{ $kid->hex }}; color: black">
                                {{ ucwords($kid->name) }}
                            </a>
                            @endforeach
                        </div>
                        <div class="notice-box-wrap m-height-660">
                            @if (count($notifies) > 0)
                            @foreach ($notifies as $notify)
                            <div class="notice-list">
                                <div class="post-date text-dark" style="background-color: {{ $notify['hex'] }}">{{
                                    date('d M, Y', strtotime($notify['created_at'])) }}
                                </div>
                                <h6 class="notice-title"><a href="#">{{ ucwords($notify['title']) }}</a></h6>
                                <p>{{ $notify['description'] }}
                                <p>
                                <div class="entry-meta">{{ ucwords($notify['teacher_name']) }} / <span>{{
                                        time_ago(strtotime($notify['created_at'])) }}</span></div>
                            </div>
                            @endforeach
                            @else
                            <div class="notice-list">
                                <h5 class="text-center">No Feedbacks to Shown</h5>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">


        </div>
        <footer class="footer-wrap-layout1">
            <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                    href="#">PsdBosS</a></div>
        </footer>

        <!-- Dashboard Content End Here -->
    </div>

    @endsection

    @section('scripts')

    <script>
        jQuery(document).ready(function(){ 	
                    jQuery('.hover').popover({  
                        title: popoverContent,  
                        html: true,  
                        placement: 'right',  
                        trigger: 'hover'
                    }); 
                }); 


    function popoverContent() {  
		var content = '';  
		var element = $(this);  
		var id = element.attr("id");  
        
		$.ajax({  
			url: "{{ route('parent.getStudentPoint') }}",  
			method: "POST",  
			async: false,  	
			// headers:
            //     { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:{	
				id : id
			},  
			dataType: "JSON",
			success:function(data){  
                console.log(data);
				content = $("#popover_html").html();				
				content = content.replace(/g_name/g, data.groupName);	
				content = content.replace(/t_points/g, data.teacherPoints);	
				content = content.replace(/p_points/g, data.parentPoints);				
			}  
		});  
		return content;  
	} 
    </script>
    <script>
        let btnDelKid = document.querySelectorAll('.btn-del-kid')
        Array.from(btnDelKid).forEach(btn => {
            btn.addEventListener('click', (e)=> {
                let con = confirm("Are You Sure?\nThis will Delete all Your Child Information Associated with this Account and will be Unrecoverable.")
                if (con == false) {
                    e.preventDefault()
                }
            })
        })
    </script>
    @endsection