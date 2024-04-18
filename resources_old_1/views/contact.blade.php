<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            font-family: 'montserrat' sans-serif;
            overflow-x: hidden;
        }

        .navbar-nav li a:hover {
            color: #fbb034 !important;
        }

        .nav {
            background-color: initial !important;
        }

        #nav::before {
            content: "";
            width: 100vw;
            min-height: 50vh;
            /* background: url('./asset/Contactbanner3.jpg') no-repeat center; */
            background: url('{{ url('assets/auth_assets/Contactbanner3.jpg') }}') no-repeat center;
            background-size: cover;
            position: absolute;
            top: 0px;
            left: 0px;
            opacity: 0.1;


        }

        #home:hover {
            cursor: pointer !important;
            color: blue;

        }

        #text {
            color: black;
        }

        .form-control {
            background-color: #f4f4f4 !important;
        }
        .FooterLink:hover{ 
            color: #fbb034 !important;

        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- nav bar -->
    <section id="nav" class="position-sticky">
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
                            <a class="nav-link text-black" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('contact-us') }}">Contact</a>
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
            <h2 class="font-weighted-bold">Contact us</h2>
            <div class="row m-0">
                <nav aria-label="breadcrumb m-0 ">
                    <ol class="breadcrumb" style="background-color: initial !important;">
                        <li class="breadcrumb-item text-black" id="home"><a href="./Login.html" id="text">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
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
    <br>
    <br>
    <br>
    <br>

    <section>
        <div class="container">
            <p class="text-center">GET IN TOUCH</p>
            <h1 class="text-center font-weight-bold">
                Contact Us
            </h1>
            <br><br>
            <div class="row">
                <div class="col col-lg-6 col-md-6 col-12 ">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control rounded p-4" id="inputPassword4"
                                    placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control rounded p-4" id="inputEmail4"
                                    placeholder="Your Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control rounded p-4" id="inputAddress" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control rounded p-4" id="inputAddress2"
                                placeholder="Website URL">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control rounded p-4" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Type your message here"></textarea>
                        </div>
                        <button class="btn btn-primary p-3 px-5" style="border-radius: 2.5rem;">Send Message</button>
                    </form>

                </div>
                <div class="col offset-1 col-lg-5 col-md-5 col-12 shadow p-3 mb-5 bg-white rounded">
                    <div class="container">
                        <div class="row ">
                            <!-- building -->
                            <div class="col-2 pr-0 justify-content-center d-flex">
                                <i class='fa fa-building' style='font-size:28px;color:rgb(31, 137, 224)'></i>
                            </div>
                            <div class="col-10 pl-0">
                                <h5 class="font-weight-bold">Company Address</h5>
                                <p>
                                    Edu School, 10001, 5th Avenue, 12202 street, London.
                                </p>
                            </div>
                            <!-- phone -->
                            <div class="col-2 pr-0 justify-content-center d-flex">
                                <i class='fa fa-phone' style='font-size:28px;color:rgb(31, 137, 224)'></i>
                            </div>
                            <div class="col-10 pl-0">
                                <h5 class="font-weight-bold">Call Us</h5>
                                <p>
                                    +1(21) 112 7368
                                </p>
                            </div>
                            <!-- Message -->
                            <div class="col-2 pr-0 justify-content-center d-flex">
                                <i class="fa-solid fa fa-envelope-open-o"  style='font-size:28px;color:rgb(31, 137, 224)'></i>
                            </div>
                            <div class="col-10 pl-0">
                                <h5 class="font-weight-bold">Email Us</h5>
                                <p>
                                    example@mail.com
                                </p>
                            </div>
                            <!-- headphone -->
                            <div class="col-2 pr-0 justify-content-center d-flex">
                                <i class="fa-solid fa fa-headphones" aria-hidden="true" style='font-size:28px;color:rgb(31, 137, 224)' ></i>
                            </div>
                            <div class="col-10 pl-0">
                                <h5 class="font-weight-bold">Customer Support</h5>
                                <p>
                                    info@support.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

<br><br><br>
    <!-- map -->
    <section>

        <div class="row">
            <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224318.41410154663!2d77.04708428406403!3d28.540464522364278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceffd525cc01b%3A0x2855561fbab51402!2sQuantum%20IT%20Innovation!5e0!3m2!1sen!2sin!4v1663485495154!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </section>

<!-- Footer -->
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