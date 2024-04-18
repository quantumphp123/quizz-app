@extends('parent.layout.layout')

@section('title','Parent Edit-Kid')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>Error!</strong> {{ session()->get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @error('password_confirmation')
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>Error!</strong> {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <div class="breadcrumbs-area">
        <h3>Parent Dashboard</h3>
        <ul>
            <li>
                <a href="{{ URL::previous() }}">Home</a>
            </li>
            <li>Edit Kid</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard Content Start Here -->
    <div class="row  d-flex align-items-center justify-content-center">
        <div class="col-12-xxxl col-12">
        <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>{{ 'Edit '.ucwords($kid['name'])."'s Account" }}</h3>
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
                        <form class="new-added-form form" action="{{ route('edit.kid.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" value="{{ $kid['userId'] }}">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Full Name *</label>
                                    <input type="text" name="fullName" value="{{ ucwords($kid['name']) }}" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>UserId</label>
                                    <input type="text" name="userId" value="{{ $kid['userId'] }}" class="form-control" autocomplete="off" readonly />
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Current Password</label>
                                    <input type="password" name="password" placeholder="*******" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender">
                                        <option value="Male" @if ($kid['gender'] == 'Male')
                                            selected
                                        @endif>Male</option>
                                        <option value="Female" @if ($kid['gender'] == 'Female')
                                        selected
                                    @endif>Female</option>
                                        <option value="others" @if ($kid['gender'] == 'Other')
                                            selected
                                        @endif>Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date Of Birth *</label>
                                    <input type="text" value="{{ $kid['dateOfBirth'] }}" name="dob" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    @php
                                        $classes = ['1' =>'I', '2' =>'II', '3' =>'III', '4' =>'IV', '5' =>'V', '6' =>'VI', '7' =>'VII', '8' =>'VIII', '9' =>'IX', '10' =>'X', '11' =>'XI', '12' =>'XII']
                                    @endphp
                                    <label>Class</label>
                                    <select class="select2" name="class">
                                        @foreach ($classes as $key => $class)
                                            @if ($kid['class'] == $key)
                                                <option value="{{ $key }}" selected>{{ $class }}</option>
                                            @else
                                            <option value="{{ $key }}">{{ $class }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Change Profile Pic</label>
                                    <input name="profilePic" type="file" class="form-control-file">
                                </div>
                                <div class="col-lg-12 col-12 form-group">
                                    <label>Short BIO</label>
                                    <textarea  class="textarea form-control" name="bio" id="form-message" cols="10"
                                        rows="9">{{ $kid['bio'] }}</textarea>
                                </div>
                              
                                {{-- <input name="parentId" type="text" value="{{ $parentId }}" class="form-control" hidden> --}}
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        
    </div>
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a>
        </div>
    </footer>
    <!-- Dashboard Content End Here -->
</div>
    
@endsection