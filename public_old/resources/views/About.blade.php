
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ url('assets/splash/app.css') }}">
   <link rel="stylesheet" href="{{ url('assets/splash/Media.css') }}">
</head>

<body>
    <!-- nav bar -->
    <header id="nav" class="position-sticky">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">

                <a class="navbar-brand" href="#">Edu School</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class=" navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-black" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('contact-us') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('about-us') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('main') }}">Log in</a>
                        </li>
                    </ul>

                </div>
            </div>

        </nav>
        <br><br>
        <div class="container">
            <h2 class="font-weighted-bold">About us</h2>
            <div class="row m-0">
                <nav aria-label="breadcrumb m-0 ">
                    <ol class="breadcrumb" style="background-color: initial !important;">
                        <li class="breadcrumb-item text-black" id="home"><a href="{{ url('main') }}" id="text">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    x
    <!-- middle 1 -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col col-md-6 col-12">
                    <img src="{{ url('assets/auth_assets/childAbout.jpg') }}" alt="...." class="img-fluid">

                    <div class="card shadow" id="popTitle">
                        <div class="card-body pt-5 pb-2">
                            <h5 class="card-title font-weight-bold rounded ">Get a Appointment Today!</h5>
                            <p class="card-text">Nemo enim ipsam oluptatem quia oluptas
                                sit aspernatur aut odit aut fugit.</p>
                            <div class="row">
                                <div class="col-2 pr-0 justify-content-center d-flex">
                                    <i class='fa fa-phone' style='font-size:28px;color:#fbb034'></i>
                                </div>
                                <div class="col-10 pl-0">
                                    <h5 class="font-weight-bold">1-800-654-3210
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <br>
                <div class="col offset-1 col-md-5 col-12 pt-5" id="box8">
                    <h1>
                        We Are The Best Choice For Your Child
                    </h1>
                    <br><br>
                    <p>Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at
                        tempufddfel. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <br><br>
                    <div class="row d-flex justify-content-start">
                        <i class='fa fa-check-circle' style="color:#fbb034"></i> &nbsp; &nbsp;
                        <p>Special Education</p>
                    </div>
                    <div class="row">
                        <i class='fa fa-check-circle' style="color:#fbb034"></i> &nbsp; &nbsp;
                        <p>Access more then 100K online courses</p>
                    </div>
                    <div class="row">
                        <i class='fa fa-check-circle' style="color:#fbb034"></i> &nbsp; &nbsp;
                        <p>Traditional Academies</p>
                    </div>
                    <button class="btn btn-warning px-5 py-2 text-white font-weight-bold" style="border-radius:2.5rem;"
                        id="btn">Apply Now</button>
                </div>
            </div>
        </div>


    </section>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section>
        <div class="container">
            <p class="text-center text-capitalized">OUR STATISTICS</p>
            <h1 class="text-center">We are Proud to Share <br> with You</h1>
            <div class="row d-flex justify-content-center">
                <div class="col col-md-3 col-sm-6 col-12 text-center">
                    <img src="{{ url('assets/auth_assets/section2Icon/people.png') }}" alt="..." width="55px" height="55px">
                    <h1>36,076</h1>
                    <p>Students Enrolled</p>
                </div>
                <div class="col col-md-3 col-sm-6 col-12  text-center">
                    <img src="{{ url('assets/auth_assets/section2Icon/gate.png') }}" alt=".." width="50px" height="50px">
                    <h1>786</h1>
                    <p>Our Branches</p>
                </div>
                <div class="col col-md-3 col-sm-6 col-12  text-center">
                    <img src="{{ url('assets/auth_assets/section2Icon/book.png') }}" alt=".." width="50px" height="50px">
                    <h1>3,630</h1>
                    <p>Total Courses</p>
                </div>
                <div class="col col-md-3 col-sm-6 col-12  text-center">
                    <img src="{{ url('assets/auth_assets/section2Icon/medal.png') }}" alt=".." width="50px" height="50px">
                    <h1>6,300</h1>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </section>

    <section id="box3" >
        <div class="row p-5">
            <div class=" mx-auto col-lg-6 col-md-6 col-12 text-center">
                <img src="{{ url('assets/auth_assets/user1.jpg') }}" alt="..." class="img-fluid rounded rounded-circle" width="100px" height="100px">
                <p class="text-white w-100 font-weight-bold" >Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                <h2 class="text-white font-weight-bold">- Gail for</h2>
            </div>
        </div>
    </section>
<br>
<br>
<br>
<br>
<br>
<br>
    <section>
        <div class="container">

            <div class="row ">
                <div class="col col-md-3 col-sm-6 col-12 my-2 d-flex justify-content-center">
                    <div class="card" style="width: 16rem;">
                        <img class="card-img-top imageHov" src="{{ url('assets/auth_assets/boy1-removebg-preview.png')}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold text-center imageHov1">Emma Watson</h5>
                          <div class="row justify-content-center d-flex">

                          <a href="">
                          <i class="fa fa-facebook-square  mx-2 fa-2x " style="width: 20px; color: blue;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-twitter-square  fa-2x text-primary mx-2 " style="width: 20px;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-google-plus-square fa-2x  text-danger mx-2 " style="width: 20px;" aria-hidden="true"></i>
                          </a> 


                          </div>
                        </div>
                      </div>
                </div>
                <div class="col col-md-3 col-sm-6 col-12 my-2 d-flex justify-content-center">
                    <div class="card" style="width: 16rem;">
                        <img class="card-img-top imageHov " src="{{ url('/assets/auth_assets/boy2-removebg-preview.png') }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold text-center imageHov1">Enrique Lal</h5>
                          <div class="row justify-content-center d-flex">

                          <a href="">
                          <i class="fa fa-facebook-square fa-2x   mx-2 " style="width: 20px; color: blue;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-twitter-square fa-2x  text-primary mx-2 " style="width: 20px;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-google-plus-square  fa-2x text-danger mx-2 " style="width: 20px;" aria-hidden="true"></i>
                          </a> 


                          </div>
                        </div>
                      </div>
                </div>
                <div class="col col-md-3 col-sm-6 col-12 my-2 d-flex justify-content-center">
                    <div class="card" style="width: 16rem;">
                        <img class="card-img-top imageHov" src="{{ url('assets/auth_assets/boy3-removebg-preview.png') }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold text-center imageHov1">Smith Ker</h5>
                          <div class="row justify-content-center d-flex">

                          <a href="">
                          <i class="fa fa-facebook-square fa-2x   mx-2 " style="width: 20px; color: blue;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-twitter-square fa-2x  text-primary mx-2 " style="width: 20px;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-google-plus-square fa-2x  text-danger mx-2 " style="width: 20px;" aria-hidden="true"></i>
                          </a> 


                          </div>
                        </div>
                      </div>
                </div>
                <div class="col col-md-3 col-sm-6 col-12 my-2 d-flex justify-content-center">
                    <div class="card" style="width: 16rem;">
                        <img class="card-img-top imageHov" src="{{ url('assets/auth_assets/boy4-removebg-preview.png') }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold text-center imageHov1">Forkler Lee</h5>
                          <div class="row justify-content-center d-flex">

                          <a href="">
                          <i class="fa fa-facebook-square  mx-2 fa-2x  " style="width: 20px; color: blue;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-twitter-square text-primary mx-2 fa-2x  " style="width: 20px;" aria-hidden="true"></i>
                          </a> 

                          <a href="">
                          <i class="fa fa-google-plus-square text-danger mx-2 fa-2x  " style="width: 20px;" aria-hidden="true"></i>
                          </a> 


                          </div>
                        </div>
                      </div>
                </div>
               
            </div>
        </div>
    </section>
    <br><br><br><br>
    <section class="my-5">
        <div class="container">
        <div class="row">
            <div class="col col-md-6 col-12">
                <img src="{{ url('assets/auth_assets/midImage.jpg') }}" alt="..." class="img-fluid">
            </div>
            <div class="col col-md-6 col-12 d-flex flex-column justify-content-center ">
                <p>OUR ENVIRONMENT</p>
                <h1>Active Learning, Expert Teachers & Safe Environment</h1><br>
                <p>Consectetur adipiscing elit. Aliquam sit amet efficitur tortor.Uspendisse efficitur orci urna. In et augue ornare, tempor massa in, luctus sapien. In et augue ornare, tempor massa.</p>
                <br><br>
                <div class="row d-flex align-items-center font-weight-bold">
                    <button class="btn btn-primary  px-4 warn2" style="border-radius: 2.5rem;" src="./Contact.html">Contact Us</button>
                    <a href="#" class="warn mx-4">Learn More &nbsp; &rightarrow;</a>
                </div>

            </div>
        </div>
    </div>
    </section>
    <section style="background: linear-gradient(to left, #11d5ff 0%, #0089cd 100%);">

<div class="container" >
    <div class="row justify-content-center align-items-center p-3 d-flex" >
        <div class="col col-md-6 col-12">
            <h1 class="text-white font-weight-bold">CALL TO ENROLL YOUR CHILD</h1>
            <p class="text-white">Begin the change today!</p>
        </div>
        <div class="col col-md-5 offset-1 col-12">
            <div class="row font-weight-bold ">
                <i class="fa fa-volume-control-phone text-white mx-2 fa-3x" aria-hidden="true"></i>
                <p><a href="#" class="warn text-white mx-2 ">+1(23) 456 789 0000</a></p>
                <button class="btn btn-white  px-4 p-2 warn2 mx-1" style="border-radius: 2.5rem;" src="./Contact.html">Join for free</button>
            </div>
        </div>
    </div>
</div>
</section>

    <!-- footer -->
    <footer  style="background-color:#060606;">
        <div class="container pt-5 pb-2">
    
        <div class="row">
        <div class="col col-lg-3 col-md-3 col-sm-6 col-12">
            <h5 class="text-white font-weight-bold">Contact Info</h5>
            <p class="text-secondary">Address : Edu School, 10001, 5th Avenue, #06</p><br>
            <p class="text-secondary">lane street, NY - 62617.</p><br>
            <p class="text-secondary">Email : info@example.com</p><br>
        </div>    
        <div class="col col-lg-3 col-md-3 col-sm-6 col-12">
            <h5 class="text-white font-weight-bold">Quick Links</h5>
            <a href="#" class="text-secondary">About us</a>
            <br>
            <br>
            <a href="#" class="text-secondary">Courses</a><br><br>
            <a href="#" class="text-secondary">Become a Teacher</a><br><br>
            <a href="#" class="text-secondary">Contact Us</a><br><br>
            <a href="#" class="text-secondary">Career</a><br><br>
        </div>    
        <div class="col col-lg-3 col-md-3 col-sm-6 col-12">
            <h5 class="text-white font-weight-bold">Explore</h5><br>
            <a href="#" class="text-secondary">Blog Posts</a><br><br>
            <a href="#" class="text-secondary">Privacy policy</a><br><br>
            <a href="#" class="text-secondary">Contact Us</a><br><br>
            <a href="#" class="text-secondary">License & uses </a><br><br>
            <a href="#" class="text-secondary">Tutorials</a><br><br>
        </div>    
            
        <div class="col col-lg-3 col-md-3 col-sm-6 col-12 pr-0">
            <h5 class="text-white font-weight-bold">Subscribe</h5><br>
            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
            <div class="input-group mb-2 mr-sm-2 ">
                <input type="email" class="form-control pr-5 py-4" id="inlineFormInputGroupUsername2" placeholder="Email Address">
                <div class="input-group-prepend rounded" style="cursor: pointer;">
                  <div class="input-group-text bg-primary"><i class="fa fa-telegram text-white bg-primary" aria-hidden="true"></i></div>
                </div>
            </div> <br>
            <p class="text-secondary">Subscribe to our mailing list and get updates to your email inbox.</p>
        </div>    
        
    </div>
    <div class="row d-flex justify-content-center">
        <p class="text-center text-white">© 2021 Edu School. All rights reserved. Design by <a href="#" class="FooterLink">W3Layouts</a></p>
    </div>
    
    </div>
    </div>
        
    </footer >




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