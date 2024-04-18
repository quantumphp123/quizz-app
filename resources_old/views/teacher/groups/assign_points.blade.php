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
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
               
                <div class="item-title">  
                        <h3>Group Name : {{$group->groupName}}</h3>
                        <h3>Student Name : {{$student->name}}</h3>               
                </div>
            </div>

            <div class="float-right">
                <input class="form-check-input" type="checkbox" value="" id="checkAll">
                <label class="form-check" for="checkAll">
                  Check to select all
                </label>
              </div>

            <form action="{{url('teacher/post-assign-points')}}" method="post">
                @csrf
            <div class="table-responsive">
                <table class="table display text-nowrap">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Parameters</th>
                            <th>Points (Out of 10)</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>Punctual</td>
                            <td>
                                <input type="number" class="form-control" name="punctual" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Discipline</td>
                            <td>
                                <input type="number" class="form-control" name="discipline" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Respectful</td>
                            <td>
                                <input type="number" class="form-control" name="respectful" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Contributing</td>
                            <td>
                                <input type="number" class="form-control" name="contributing" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Organized</td>
                            <td>
                                <input type="number" class="form-control" name="organized" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Performing</td>
                            <td>
                                <input type="number" class="form-control" name="performing" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Responsible</td>
                            <td>
                                <input type="number" class="form-control" style="width: 30%" name="responsible" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Co-Operative</td>
                            <td>
                                <input type="number" class="form-control" style="width: 30%" placeholder="..."  name="coperative"class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>LeaderShip</td>
                            <td>
                                <input type="number" class="form-control" name="leadership" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Determined</td>
                            <td>
                                <input type="number" class="form-control" name="determined" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Self Confidence</td>
                            <td>
                                <input type="number" class="form-control" name="selfConfidence" style="width: 30%" placeholder="..." class="point_value">
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Obedient</td>
                            <td>
                                <input type="number" class="form-control" name="obedient" style="width: 30%" placeholder="..." id="point_value">
                            </td>
                        </tr>
                    </tbody>
                
                </table>
                <input type="hidden" name="groupId" value="{{$group->id}}">
                <input type="hidden" name="studentId" value="{{$student->id}}">
            </div>
                <button class="btn btn-primary" type="submit" style="font-size:20px;margin-left:40%">Assign</button>
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
