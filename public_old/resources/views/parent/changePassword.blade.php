@extends('parent.layout.layout')

@section('title','Parent-My Profile')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Change Password</h3>
        <ul>
            <li>
                <a href="{{route('parent.dashboard')}}">Home</a>
            </li>
            <li>Change Password</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Change Password</h3>
                    @if (session()->has('error'))
                    <p class="text-danger mt-3">{{ '* '.session('error') }}</p>
                    @endif
                    @if (session()->has('success'))
                    <p class="text-success mt-3">{{ session('success') }}</p>
                    @endif
                </div>
            </div>
            <form class="form" action="{{ route('parent.change.password.post') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 form-group">
                        <label>Current Password</label>
                        <input type="password" name="current_password" placeholder="**************" class="form-control">
                        @error('current_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 form-group">
                        <label>New Password</label>
                        <input type="password" name="password" placeholder="********" class="form-control">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 form-group">
                        <label>Re-Enter New Password</label>
                        <input type="password" name="password_confirmation" placeholder="********" class="form-control">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Student Details Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
</div>


@endsection