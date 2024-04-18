<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            width: 100vw;
            height: 100vh;
            
            
        }
        .bg{


            background-image: url(https://images.rawpixel.com/image_1300/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjg3M2JhdGNoNC1hZXctMDVfMS5qcGc.jpg);
            height:100%;
            width:100%;
            position:absolute;

 

        }
        .box{
            width: 30vw;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
           position: relative;
           left:60%;
           top:10%;
           background-color: aliceblue;
           padding: 1%;
           border-radius: 3%;

        }
    </style>
    <title>Parent Login</title>
</head>

<body class="d-flex justify-content-center align-items-center ">
    <div class="bg">
    
    <div class="box">
        <div style="margin:50%" class="m-5">

                
                <h1>Welcome back</h1>
                <p class="text-secondary">Welcome back ! Please enter your details.</p>
                <ul class="pl-3">
                    <li class="font-weighted-bold">Logging in as Parent</li>
                </ul>
                <div class="row">
                    <div class="col-12">
                        @if(session()->has('err_msg'))
                <div class="alert alert-danger">
                        <p>{{ session('err_msg') }}</p>
                    </div>
                @endif
                @php
                    Session::forget('err_msg');
                @endphp
                @if($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif


                @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{session('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   {{session()->flush()}}
                  @endif
                        <!-- form here -->
                        <div class="form-group d-flex justify-content-start">
                            <small class="text-left">
                                <a href="{{ route('parent.signup') }}" class="text-primary">New Here? Signup</a>
                            </small>
                        </div>
                        <form action="{{ route('parent.login.post') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="*******">
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <small class="text-right">
                                    <a href="#" class="text-primary">Forgot Password?</a>
                                </small>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary ml-0 my-2">Log in</button>
                        </form>
                    </div>
                </div>
        </div>

    </div>



    </div>




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