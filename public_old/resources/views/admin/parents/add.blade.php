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
    <title>Add Parent</title>
</head>

<body class="d-flex justify-content-center align-items-center ">
    <div class="box">
        {{-- <p class="text-secondary">Welcome back ! Please enter your details.</p> --}}
   
        <div class="row">
            <div class="col-12">
                <!-- form here -->
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <p><strong>Created!&nbsp;{{ session('success') }}</strong></p>
                    </div>
                @endif
                <div class="form-group d-flex justify-content-start">
                        {{-- <span class="text-left">
                            <a href="{{ route('ParentLogin') }}" class="text-primary">Already Have an Account? Login Instead</a>
                        </span> --}}
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name </label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby=""
                            placeholder="Name...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Email...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputContact1">Contact </label>
                        <input type="text" name="contact_number" class="form-control" id="exampleInputContact1" aria-describedby="ContactHelp"
                            placeholder="Contact Number">
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