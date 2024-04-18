@extends('admin.layout.layout')

@section('title','Admin-Quiz Schedule')
    
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Quiz</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Quiz Schedule</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Exam Schedule Area Start Here -->
    <div class="row">
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Add New Quiz</h3>
                        </div>
                    </div>
                    <form class="new-added-form">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Quiz Name</label>
                                <input type="text" placeholder="" class="form-control">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Subject Type *</label>
                                <select class="select2">
                                    <option value="">Please Select</option>
                                    <option value="1">Bangla</option>
                                    <option value="2">English</option>
                                    <option value="3">Mathematics</option>
                                    <option value="3">Economics</option>
                                    <option value="3">Chemistry</option>
                                </select>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Select Class *</label>
                                <select class="select2">
                                    <option value="3">One</option>
                                    <option value="3">Two</option>
                                    <option value="3">Three</option>
                                    <option value="3">Four</option>
                                    <option value="3">Five</option>
                                    <option value="3">Six</option>
                                    <option value="3">Seven</option>
                                    <option value="3">Eight</option>
                                    <option value="3">Nine</option>
                                    <option value="3">Ten</option>
                                    <option value="3">Eleven</option>
                                    <option value="3">Twelve</option>
                                    <option value="3">Thirteen</option>
                                    <option value="3">Fourteen</option>
                                </select>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Select Class *</label>
                                <input type="date" name="" id="" class="form-control">
                            </div>
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>All Quiz Schedule</h3>
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
                    
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input checkAll">
                                            <label class="form-check-label">Quiz Name</label>
                                        </div>
                                    </th>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Class Test</label>
                                        </div>
                                    </td>
                                    <td>Mathematics</td>
                                    <td>4</td>
                                    <td>20/06/2019</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Class Test</label>
                                        </div>
                                    </td>
                                    <td>Mathematics</td>
                                    <td>4</td>
                                    <td>20/06/2019</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Class Test</label>
                                        </div>
                                    </td>
                                    <td>Mathematics</td>
                                    <td>4</td>
                                    <td>20/06/2019</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Exam Schedule Area End Here -->
    <footer class="footer-wrap-layout1">
        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by
            <a href="#">PsdBosS</a></div>
    </footer>
</div>
    
@endsection