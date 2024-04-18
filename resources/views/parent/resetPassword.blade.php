<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/admin/img/favicon.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            width: 100vw;
            height: 100vh;
            /* background-color: #0c2c41; */
            
        
            /* Created with https://www.css-gradient.com */
            background: #D0B7F7;
            background: -webkit-linear-gradient(top left, #f7b7b7, #ed5a5a);
            background: -moz-linear-gradient(top left, #f7b7b7, #ed5a5a);
            background: linear-gradient(to bottom right, #f7b7b7, #ed5a5a);

            
            
        }
        .bg{


            background-image: url(https://images.rawpixel.com/image_1300/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjc4M2JhdGNoNS1hZXctMjBfMS5qcGc.jpg);
            height:100%;
            width:100%;
            /* position:absolute; */

 

        }
        .box{
            /* width: 30vw; */
            
            /* box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; */
           /* position: relative; */
           /* left:5%;
           top:10%; */
           /* background-color: aliceblue; */
           padding: 1%;
           border-radius: 3%;
           

        }
        .main-box{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;


        }

    </style>
    <title>Reset Password</title>
</head>

<body class="d-flex justify-content-center align-items-center ">

    <div style="margin:auto; margin-inline:10%">

        <div class="row main-box">
            <div class="col-lg-7 p-0">

                <div style="height:100%; width: 100%;">
                    <img style="width:100%; height:100%" src="{{ url('assets/reset-pwd-img.png') }}"/>
                </div>

            </div>
            <div class="col-lg-5 align-items-center" style="background-color: white;">

                <div style="margin-top:20%" class="box">
                    <div class="m-5">
            
                            
                            <p class="h2"><b>RESET PASSWORD</b></p>
                            <p class="text-secondary ">Welcome! Please enter your new password.</p>
                            <!-- <ul class="pl-3 m-5"> 
                                <b>I am a:</b>&nbsp;
                                <input type="radio" name="reset-pwd" class="font-weighted-bold"> Teacher</li> &nbsp; 
                                <input type="radio" name="reset-pwd" class="font-weighted-bold"> Parent</li>
                            </ul> -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- form here -->
                                    <form action="{{ route('parent.reset.password.post') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        <div class="form-group">
                                            <label for="exampleInputPwd">Password </label>
                                            <input type="password" class="form-control" id="exampleInputPwd" 
                                                name="password" placeholder="Enter New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfPwd">Confirm Password </label>
                                            <input type="password" class="form-control" id="exampleInputConfPwd"
                                                name="password_confirmation" placeholder="Confirm New Password">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-block btn-primary ml-0 my-2">Submit</button>
                                        <!-- <button type="submit" class="btn btn-block bg-white border border-black ml-0 my-2"> <img src="./asset/googIcon.png" width="30px" height="30px" alt="..."> Log in with Google</button> -->
                                    </form>
                                </div>
                            </div>
                    </div>
            
                </div>


                

            </div>
        </div>
    </div>
  
    
    <!-- <div class="box">
        <div style="margin:50%" class="m-5">

                
                <h1>Welcome back</h1>
                <p class="text-secondary">Welcome back ! Please enter your details.</p>
                <ul class="pl-3">
                    <li class="font-weighted-bold">Logging in as Student</li>
                </ul>
                <div class="row">
                    <div class="col-12">
                        form here
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*******">
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <small class="text-right">
                                    <a href="#" class="text-primary">Forgot Password?</a>
                                </small>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary ml-0 my-2">Log in</button>
                            <button type="submit" class="btn btn-block bg-white border border-black ml-0 my-2"> <img src="./asset/googIcon.png" width="30px" height="30px" alt="..."> Log in with Google</button>
                        </form>
                    </div>
                </div>
        </div>

    </div> -->



   




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
 </div>
</body>

</html>