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
        .box{
            width: 30vw

        }
    </style>
    <title>Login</title>
</head>

<body class="d-flex justify-content-center align-items-center ">
    <div class="box">
        <h1>Welcome back</h1>
 
        <ul class="pl-3">
            <li class="font-weighted-bold">Loging in as Student</li>
        </ul>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <div class="row">
            <div class="col-12">
                <!-- form here -->
                <form action="{{route('student.postLogin')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="userId">User Id </label>
                        <input type="text" class="form-control" name="userId" id="userId"
                            placeholder="Enter your User Id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="*******">
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        {{-- <small class="text-right">
                            <a href="#" class="text-primary">Forgot Password?</a>
                        </small> --}}
                    </div>
                    <button type="submit" class="btn btn-block btn-primary ml-0 my-2">Log in</button>
                    {{-- <button type="submit" class="btn btn-block bg-white border border-black ml-0 my-2"> <img src="./asset/googIcon.png" width="30px" height="30px" alt="..."> Log in with Google</button> --}}
                </form>
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
</body>

</html>