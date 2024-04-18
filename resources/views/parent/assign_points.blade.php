@extends('parent.layout.layout')

@section('title','Parent-Assign Points')

@section('styles')
    <style>
        .hide {
            display: none;
        }
    </style>
@endsection

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Assign Points</h3>
        <ul>
            <li>
                <a href="{{url('parent/dashboard')}}">Home</a>
            </li>
            <li>Assign Points</li>
        </ul>
    </div>
   
    <!-- Breadcubs Area End Here -->

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
     {{-- <a href="{{ url()->previous() }}">
        <button class="btn-danger btn btn-lg btn-outline mb-2" style="width: 10%">Back</button>
     </a> --}}
     @if (session()->has('errors'))
        @foreach (session('errors') as $error)
            <p class="text-danger">{{ '* '. $error }}</p>
        @endforeach
     @endif
     @if (session()->has('comment_errors'))
        @foreach (session('comment_errors') as $error)
            <p class="text-danger">{{ '* '. $error }}</p>
        @endforeach
     @endif
     <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <h3>Assign Points</h3>
                <div class="item-title">                 
                </div>
            </div>
            <form action="{{ route('parent.postAssignPoints') }}" method="post">
                @csrf
            <div class="table-responsive">
                @if (count($points_by_parent) != 0)
                <h5>
                    Points Already Assigned for This Week
                </h5>
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
                        <input type="hidden" name="parentId" value="{{ session()->get('parentId') }}">
                        <input type="hidden" name="studentId" value="{{ $kidId }}">
                        @php
                            $params = ['punctual', 'discipline', 'respectful', 'contributing', 'organized', 'performing', 'responsible', 'co-operative', 'leadership', 'determined', 'obedient'];
                        @endphp
                        @for ($i = 0; $i < count($params); $i++)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ ucwords($params[$i]) }}</td>
                            <td>
                                <select name="{{ $params[$i] }}" class="form-control param-points" style="width: 50%;">
                                    <option value="0" selected>Choose Yes or No</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <textarea class="form-input my-3 pl-4 py-1 hide" name="{{ $params[$i].'comment' }}" style="width: 50%; font-size:1.4rem; border: 1px solid #CED4DA;" placeholder="Please Mention Reason for No"></textarea>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                
                </table>
                @endif
            </div>
            @if (count($points_by_parent) == 0)
            <button class="btn btn-primary" type="submit" style="font-size:20px;margin-left:40%">Assign</button>
            @endif
            </form>
        </div>
    </div>
    <!-- Student Table Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
                href="#">PsdBosS</a></div>
    </footer>
</div>

@endsection

@section('scripts')
    <script>
        let paramPoints = document.querySelectorAll('.param-points')
        Array.from(paramPoints).forEach(option => {
            option.addEventListener('change', (e)=> {
                if (e.target.value == 'no') {
                    e.target.nextElementSibling.classList.remove("hide")
                }
                else {
                    if (!e.target.nextElementSibling.classList.contains("hide")) {
                        e.target.nextElementSibling.classList.add("hide")
                    }
                }
            })
        })
    </script>
@endsection
