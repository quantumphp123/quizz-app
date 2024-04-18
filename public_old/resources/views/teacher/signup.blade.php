<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            /* width: 100vw;
            height: 100vh; */
            background-color: #C2CFFA;
            /* background-color: #11c8aa   ; */
        }
        .box{
            width: 30vw

        }
    </style>
    <title>Teacher Signup</title>
</head>

<body class="d-flex justify-content-center align-items-center ">
    <div class="box">
        <h1>Welcome back</h1>
        {{-- <p class="text-secondary">Welcome back ! Please enter your details.</p> --}}
        <ul class="pl-3">
            <li class="font-weighted-bold">Signup as Teacher</li>
        </ul>
        <div class="row">
            <div class="col-12">
                <!-- form here -->
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
                <div class="form-group d-flex justify-content-start">
                        <span class="text-left">
                            <a href="{{ route('teacherLogin') }}" class="text-primary">Already Have an Account? Login Instead</a>
                        </span>
                </div>
                <form action="{{route('teacherSignupPost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name </label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby=""
                            placeholder="Enter your Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter your Email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputContact1">Contact </label>
                        <input type="text" name="contact" class="form-control" id="exampleInputContact1" aria-describedby="ContactHelp"
                            placeholder="Enter your Contact">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputContact1">Date of Birth </label>
                        <input type="date" name="dob" class="form-control" id="exampleInputContact1" aria-describedby="ContactHelp"
                            placeholder="Enter Your Date of Birth">
                    </div>
                    
            
                        <label for="select_students">Classes </label>
                        <select name ="class[]" class="form-control form-control-sm select" id="select_students" multiple="multiple" style="width: 100%">
                            <option value="">Please Select Class *</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                            <option value="5">V</option>
                            <option value="6">VI</option>
                            <option value="7">VII</option>
                            <option value="8">VIII</option>
                            <option value="9">IX</option>
                            <option value="10">X</option>
                            <option value="11">XI</option>
                            <option value="12">XII</option>
                            <option value="13">XII</option>
                            <option value="14">XIV</option>
                        </select>
             

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="*******">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword14">Re-enter Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword14" placeholder="*******">
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <small class="text-right">
                            <a href="#" class="text-primary">Forgot Password?</a>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary ml-0 my-2">Create Account</button>
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



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    
      $(document).ready(function(){

        $(".select").select2({
                 placeholder:"Select classes..."
        });

      });
</script>
    

</body>

</html>