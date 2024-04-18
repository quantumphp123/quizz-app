@extends('teacher.layout.layout')

@section('title','Teacher Edit Assignment')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="breadcrumbs-area">
        <h3>Teacher Dashboard</h3>
        <ul>
            <li>
                <a href="{{ URL::previous() }}">Home</a>
            </li>
            <li>Edit Assignment</li>
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
                            <h3>Edit Assignment</h3>
                        </div>
                        {{-- <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div> --}}
                    </div>
                    <form action="{{ route('edit.assignment.post') }}" method="post">
                        @csrf
                        <input type="hidden" name="assignmentId" value="{{ $assignment->id }}">
                        <div class="form-group">
                            <label for="assignmentTitle">Assignment Title</label>
                            <input type="text" name="title" class="form-control" id="assignmentTitle" value="{{ $assignment->subject }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="assignment">Assignment Description</label>
                            <textarea name="assignment" class="form-control" id="assignment" cols="30" rows="10"
                                required>{{ $assignment->assignment }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="date" placeholder="mm/dd/yyyy" name="dueDate"
                                class="form-control air-datepicker" data-position='bottom right' value="{{ $assignment->dueDate }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-3">Edit</button>
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