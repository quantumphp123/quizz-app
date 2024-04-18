@extends('parent.layout.layout')

@section('title','Parent::Add Kid')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->

    @if(session()->has('err_msg'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>Error!</strong> {{ session()->get('err_msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="breadcrumbs-area">
        <h3>Parent Dashboard</h3>
        <ul>
            <li>
                <a href="{{ URL::previous() }}">Home</a>
            </li>
            <li>Add Kid</li>
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
                                <h3>Add New Kid</h3>
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
                        <form class="new-added-form form" action="{{ route('parent.kid.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Full Name *</label>
                                    <input type="text" name="fullName" placeholder="" class="form-control">
                                    @error('fullName')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>UserId (for child login) *</label>
                                    <input type="text" name="userId" placeholder="" class="form-control" autocomplete="off">
                                    @error('userId')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Password (for child login) *</label>
                                    <input type="password" name="password" placeholder="" class="form-control" autocomplete="off">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender">
                                        <option value="">Please Select Gender *</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date Of Birth *</label>
                                    <input type="text" placeholder="dd/mm/yyyy" name="dob" class="form-control air-datepicker"
                                        data-position='bottom right'>
                                    <i class="far fa-calendar-alt"></i>
                                    @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <select class="select2" name="class">
                                        <option value="">Please Select Class *</option>
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                        <option value="3">III</option>
                                        <option value="4">IV</option>
                                        <option value="5">V</option>
                                        <option value="6">VI</option>
                                        <option value="7">VII</option>
                                        <option value="8">VIII</option>
                                        <option value="9">IX</option>
                                        <option value="10">X</option>
                                        <option value="11">XI</option>
                                        <option value="12">XII</option>
                                        <option value="13">XII</option>
                                        <option value="14">XIV</option>
                                    </select>
                                    @error('class')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                                    <input name="profilePic" type="file" class="form-control-file">
                                </div>
                                <div class="col-lg-12 col-12 form-group">
                                    <label>Short BIO</label>
                                    <textarea  class="textarea form-control" name="bio" id="form-message" cols="10"
                                        rows="9"></textarea>
                                </div>
                              
                                <input name="parentId" type="text" value="{{ $parentId }}" class="form-control" hidden>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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