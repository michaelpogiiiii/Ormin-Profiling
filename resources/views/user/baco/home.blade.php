<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>PYDC</title>

    <link rel="stylesheet" href="../dash/assets/css/maicons.css">

    <link rel="stylesheet" href="../dash/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../dash/assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../dash/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../dash/assets/css/theme.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>

    <style>
        /* Add some basic styling for the form */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="text-primary">PY</span>DC</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto" id="navList">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        @if ($data->isEmpty())
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#programs">Announcement</a>
                            </li>
                        @endif
                        @if ($data2->isEmpty())
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#announce">Past Events</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('BacoProfiling') }}">Profiling</a>
                        </li>
                        <x-app-layout></x-app-layout>
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="page-hero bg-image overlay-dark" style="background-image: url(../dash/assets/img/pydcbg.png);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="display-4">PROVINCIAL YOUTH</span>
                <h1 class="subhead">DEVELOPMENT COUNCIL</h1>
            </div>
        </div>
    </div>


    <div class="bg-light">
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-success text-white">
                                <span class="mai-chatbubbles-outline"></span>
                            </div>
                            <p>Discover Announcement</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-primary text-white">
                                <span class="mai-shield-checkmark"></span>
                            </div>
                            <p>View Events</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="mai-basket"></span>
                            </div>
                            <p>Register for Youth Profiling</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section -->

        <div class="page-section pb-0" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <p class="text-grey mb-4 text-justify" style="line-height: 35px">
                            <span style="font-size:20px; font-weight:bold;">Provincial Youth Development Council of
                                Oriental Mindoro</span> is a dynamic organization dedicated to empowering and
                            uplifting
                            the youth within the province. As a government-led council, its primary mission is to
                            formulate and implement policies, programs, and projects that address the needs and
                            aspirations of young individuals. The council serves as a platform for collaboration and
                            engagement between the youth and various stakeholders, including government agencies,
                            educational institutions, civil society organizations, and the private sector. By fostering
                            youth participation, promoting their rights, and harnessing their potential, the Provincial
                            Youth Development Council of Oriental Mindoro aims to create a vibrant and inclusive
                            environment that enables the youth to thrive, contribute to society, and shape a better
                            future for themselves and their communities.
                        </p>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1 rounded-circle">
                            <img src="pydc.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    @include('user.baco.programs')

    @include('user.baco.announcement')
    <!-- .page-section -->

    <!-- .page-section -->

    {{-- <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../dash/assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="../dash/assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../dash/assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home --> --}}

    @include('user.baco.footer')

    <script src="../dash/assets/js/jquery-3.5.1.min.js"></script>

    <script src="../dash/assets/js/bootstrap.bundle.min.js"></script>

    <script src="../dash/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../dash/assets/vendor/wow/wow.min.js"></script>

    <script src="../dash/assets/js/theme.js"></script>
    <script>
        //Navigation
        const navItems = document.querySelectorAll('.nav-item');
        for (var i = 0; i < navItems.length; i++) {
            (function(index) {
                navItems[index].addEventListener('mouseover', function() {
                    navItems[index].setAttribute('class', 'nav-item active animate__animated animate__fadeIn');
                });

                navItems[index].addEventListener('mouseout', function() {
                    navItems[index].setAttribute('class', 'nav-item');
                });
            })(i);


        }
    </script>

    {{-- animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</body>

</html>
