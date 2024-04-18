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
            /* width: 100vw;
            height: 100vh; */
            overflow-x: hidden;
        }
    </style>
    <title>Login</title>
</head>

<body class="">
    <div class="row pt-3 mb-3">
        <div class="col-3 ml-auto d-flex text-dark">
            <a href="{{ url('/') }}" class="text-dark mx-1">About Us</a>
            <a href="#" class="text-dark mx-1" class="mx-2">Terms and Condition</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-2 col-3 mx-auto text-center">
            <img src="{{url('assets/main/asset/ellipseIcon/Rectangle 5.png')}}" alt="" class="img-fluid">
        </div>
        <div class="w-100"></div>
        <br>
        <div class="col-6 mx-auto">
            <h3 class="text-center">Who’s using Webapp?</h3>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacinia dapibus est a
                condimentum. Proin fringilla ipsum vitae elit consequat sollicitudin. M</p>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-wrap" style="height: 192px;">

            <a href="{{route('teacherLogin')}}" class="loginCard" id="card1">
                <div class="card m-2 d-flex text-center  align-items-center p-3" style="width: 176px; height: 192px;">
                    <h5 class="text-center text-dark">Teacher</h5>
                    <br>
                    <img class="text-center" width="80px" height="80px" src="{{url('assets/main/asset/ellipseIcon/Ellipse 1.png')}}"
                        alt="Card image cap">
                </div>
            </a>
            <a href="{{route('student.login')}}" class="loginCard" id="card2">
                <div class="card m-2 d-flex text-center  align-items-center p-3" style="width: 176px; height: 192px;">
                    <h5 class="text-center text-dark">Kid's</h5>
                    <br>
                    <img class="text-center" width="80px" height="80px" src="{{url('assets/main/asset/ellipseIcon/Ellipse 2.png')}}"
                        alt="Card image cap">
                </div>
            </a>
            <a href="{{route('parent.login')}}" class="loginCard" id="card3">
                <div class="card m-2 d-flex text-center  align-items-center p-3" style="width: 176px; height: 192px;">
                    <h5 class="text-center text-dark">Parent</h5>
                    <br>
                    <img class="text-center" width="80px" height="80px" src="{{url('assets/main/asset/ellipseIcon/Ellipse 3.png')}}"
                        alt="Card image cap">
                </div>
            </a>
            <a href="{{url('admin/login')}}" class="loginCard" id="card4">
                <div class="card m-2 d-flex text-center  align-items-center p-3" style="width: 176px; height: 192px;">
                    <h5 class="text-center text-dark">Admin</h5>
                    <br>
                    <img class="text-center" width="80px" height="80px" src="{{url('assets/main/asset/ellipseIcon/Ellipse 4.png')}}"
                        alt="Card image cap">
                </div>
            </a>


        </div>


    </div>

    <script>
//set the port according to your device  in following href.





    </script>   




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