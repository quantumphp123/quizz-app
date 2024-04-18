@extends('student.layout.layout')

@section('title','Student::Points')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>My Points</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>My Points</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <!-- Add Notice Area End Here -->
        <!-- All Notice Area Start Here -->
        <div class="col-6-xxxl col-6">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title pt-2">
                            <h3>Points by Teacher</h3>
                        </div>
                    </div>
                    <div class="notice-board-wrap pt-4">
                        <div class="notice-list">
                            <div class="table-responsive">
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
                                        $i = 1
                                        @endphp
                                        @if (count($points_by_teacher) != 0)
                                        @foreach ($points_by_teacher as $point)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ ucwords($point->reason) }}</td>
                                            <td>
                                                @if ($point->point == true)
                                                Yes
                                                @else
                                                No <br>
                                                <p class="mb-0">{{ $point->comment }}</p>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                        $i++
                                        @endphp
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3"><p class="text-center">Teacher Hasn't Assigned you Points Yet</p></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6-xxxl col-6">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title pt-2">
                            <h3>Points by Parent</h3>
                        </div>
                    </div>
                    <div class="notice-board-wrap pt-4">
                        <div class="notice-list">
                            <div class="table-responsive">
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
                                        $i = 1
                                        @endphp
                                        @if (count($points_by_parent) != 0)
                                        @foreach ($points_by_parent as $point)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ ucwords($point->reason) }}</td>
                                            <td>
                                                @if ($point->point == true)
                                                Yes
                                                @else
                                                No <br>
                                                <p class="mb-0">{{ $point->comment }}</p>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                        $i++
                                        @endphp
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3"><p class="text-center">Teacher Hasn't Assigned you Points Yet</p></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- All Notice Area End Here -->
        </div>
        <footer class="footer-wrap-layout1">
            <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by
                <a href="#">PsdBosS</a>
            </div>
        </footer>
    </div>

    @endsection