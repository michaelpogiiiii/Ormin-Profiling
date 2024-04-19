<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>PYDC</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair:wght@600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <link href="user/css/bootstrap.css" rel="stylesheet">
    <link href="user/css/fontawesome-all.css" rel="stylesheet">
    <link href="user/css/swiper.css" rel="stylesheet">
    <link href="user/css/magnific-popup.css" rel="stylesheet">
    <link href="user/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">

    <style>
      
        .title-h1 {
            text-decoration: none;
            cursor: pointer;
        }

        .title-h1 h1 {
            color: white;
        }

        .accordion-title {
            margin-bottom: 20px;
        }

        .question {
            padding: 18px 0;
            font-size: 15px;
            cursor: pointer;
            border-bottom: 1px solid black;
            position: relative;
        }

        .question::after {
            font-size: 15px;
            content: '+';
            position: absolute;
            right: 5px;
        }

        .answer {
            
            padding-top: -15px;
            font-size: 13px;
            line-height: 1.5;
            height: 0;
            overflow: hidden;
            transition: .5s;
            text-align: justify;
        }

        /* Active Link */
        .acc-container.active .answer {
            height: 220px;
            margin-bottom: -123px;
        }

        .acc-container.active .question {
            font-size: 15px;
            transition: .5s;
            color: #98fb98;
            font-weight: bolder;
        }

        .acc-container.active .question::after {
            content: '-';
            transition: .5s;
            font-size: 20px;
        }

        .infinite {
            animation-iteration-count: infinite;
        }

        .slow {
            animation-duration: 4;
        }

        @media (max-width: 767px) {
            #imgg {
                display: none;
            }
        }
        .btn{
            margin-top: 30px;
            background-color: #efefef;
            border: none;
            border-radius: 25px;
            color: #424242;
           
        }
    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">

<div style="background-image: url('bg2.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 700px;">
   
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Name</a> -->

            <!-- Image Logo -->
            <a href="index.html" class="title-h1">
            <h1> GO-YDD <i class="fa fa-handshake-o" style="font-size: 30px;"></i> PYDC </h1>
            </a>
  
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#bout">About</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Drop</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item page-scroll" href="terms.html">Terms Conditions</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item page-scroll" href="privacy.html">Privacy Policy</a>
                            </div>
                        </li> --}}
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm page-scroll" href="{{ route('login') }}">Login</a>
                </span>
                <span class="nav-item">
                    <a class="btn-outline-sm page-scroll" href="{{ route('register') }}">Register</a>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large"> GO-YDD <span id="js-rotating">innovative, inspiring, engaged</span></h1>
                        <p class="p-large text-justify">
                            The Office of the Governor - Youth Development Division (GO-YDD) is a local government-led
                            initiative aimed at promoting the overall development of young people in a specific province
                            or region.
                            It serves as a platform for engaging and empowering youth in various activities, programs,
                            and policies that address their needs and concerns.
                            The council brings together government agencies, non-governmental organizations, youth
                            organizations, and other stakeholders to collaborate and coordinate efforts towards creating
                            a conducive environment for the growth and development of young people.
                        </p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6" id="imgg">
                    <div class="d-flex flex-wrap">
                        <img class="w-40" src="orminnew.png" alt="alternative"  style="height: 210px; margin-top: 25px; margin-left:30px">
                        <img src="goyddbgfinal2.png" alt="alternative" style="height: 210px; margin-left:38px"  class="mt-3">
                        <img class="w-45" src="pydcnew.png" alt="alternative"
                            style="height: 210px; margin-left:153px">
                        </div>
                    </div> <!-- end of image-container -->
                </div> <!-- end of div -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    {{-- About --}}
    @include('about')

         <!-- end of basic-1 -->

    <!-- Copyright -->
    <div class="copyright " id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5">
                    <p><i class="fa fa-envelope" style="font-size:20px;"></i> pydcormin@yahoo.com</p>
                    <p><i class="fa fa-envelope" style="font-size:20px;"></i> pgormpydc@gmail.com</p>
                    <p><a href="https://www.youtube.com/@orientalmindoropydc2757" target="_blank"><i class="fab fa-youtube"
                                style="font-size:20px; "></i></a> www.youtube.com/@orientalmindoropydc2757</p>
                    <p><a href="https://www.facebook.com/pydoormin" target="_blank"><i class="fab fa-facebook"
                                style="font-size:20px; "></i></a> www.facebook.com/pydoormin</p>

                    <p class="p-small" > <em> © PUP Bansud Intern </em> <span id="year"></span></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="user/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="user/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="user/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="user/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="user/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="user/js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="user/js/scripts.js"></script> <!-- Custom scripts -->
    <script>
        const year = new Date().getFullYear();
        document.getElementById('year').innerText = year;
    </script>
</body>

</html>
