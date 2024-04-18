@extends('parent.layout.layout')

@section('title','Parent-Dashboard')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->



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


        <div class="col-5-xxxl col-12">

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
                                    <div class="col-12-xxxl col-xl-6 col-12">
                                       
                                        <div class="kids-details-box mb-5">
                                            
                                            <div class="item-img">
                                                @if($kid->profilePic==NULL)

                                                <img src="{{url('public/dummyImages/image1.jpg')}}" alt="kids" style="height:98px;width:98px;">


                                                @else 

                                                <img src="{{$kid->profilePic}}" alt="kids" style="height:98px;width:98px;">
                                          @endif
                                            </div>
                                          

                                            <div class="item-content table-responsive">

                                                {{-- Feedback Button --}}

                                                <button type="button"  class="btn btn-danger float-right" data-toggle="modal" data-target="#feedback{{$kid->id}}">Feedback</button>                                                
                                                
                                                <table class="table text-nowrap">
                                                    <tbody>
                                                        <tr>
                                                            <td>User ID:</td>
                                                            <td>{{ $kid->userId }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name:</td>
                                                            <td>
                                                                <a href="#">
                                                                    {{ $kid->name }}
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
                                                        <tr>
                                                            <td>
                                                                <a href="{{ route('parent.viewPoints', ['kidId' => $kid->id]) }}">
                                                                    <button class="btn btn-success ">View Points</button>
                                                                 </a>

                                                            </td>
                                                            <td> 
                                                                <a href="{{ route('parent.assignPoints', ['kidId' => $kid->id]) }}">
                                                                    <button class="btn btn-success ">Assign Points</button>
                                                                 </a>
                                                            </td>
                                                        </tr>
                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>




                                    
                            <div class="modal fade" id="feedback{{$kid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Feedback To my child</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                            
                                        <form action="{{ route('parent.student.feedback') }}" method="post">
                                          @csrf
                            
                                          <input type="hidden" value="{{$kid->id}}" name="studentId">
                            
                                          <label for="title">Title</label>

                                              <input type="text" class="form-control mb-3" name="title" id="title" required>
                            
                                              <label for="description">Describe</label>

                                            <textarea class="form-control" name="description" id="description" cols="30" rows="8" placeholder="Describe your feedback..." required></textarea>
                                  
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-primary mt-3">Send</button>
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



        
        <div class="col-xl-12 col-7-xxxl col-12">
            <div class="card dashboard-card-six">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Notifications</h3>
                        </div>
                        <div class="dropdown">
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
                        </div>
                    </div>
                    <div class="notice-box-wrap m-height-660">
                        <div class="notice-list">
                            <div class="post-date bg-skyblue">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag mene esom tus eleifend
                                    lectus
                                    sed maximus mi faucibusnting.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-yellow">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-pink">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag Nulla rhoncus eleifensed
                                    mim
                                    us mi faucibus id. Mauris vestibulum non purus lobortismenearea</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-blue">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag mene esom text of the
                                    printing.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-yellow">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-blue">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag meneesom.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-pink">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag meneesom.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
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