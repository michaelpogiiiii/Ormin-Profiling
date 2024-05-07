<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>GO-YDD</title>

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

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&display=swap" rel="stylesheet">

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

<body style="position: relative;">

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="text-primary">GO-YDD</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home#about">About</a>
                        </li>
                        @if ($data->isEmpty())
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/home#programs">Announcement</a>
                            </li>
                        @endif
                        @if ($data2->isEmpty())
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/home#announce">Past Events</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('BansudProfiling') }}">Profiling</a>
                        </li>
                        <x-app-layout></x-app-layout>
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>
    @foreach ($event as $data)
        <div class="row container-fluid m-auto" style="background-color: #001400">
            <div class="page-hero bg-image overlay-light col-sm-6 wow fadeInLeft"
                style="background-image: url(/eventimage/{{ $data->photo }});">
            </div>
            <div class="page-hero bg-image overlay-light col-sm-6 text-center wow fadeInRight p-2"
                style="background-color: green; border: solid white">
                <h1 style="font-family: cursive, sans-serif;;font-weight:800; font-size:50px"> {{ $data->name }} </h1>
                <p class="mt-3" style="font-family: 'Alegreya Sans SC', sans-serif; font-size:25px;">
                    {{ $data->about }} </p>
                <p class="mt-1" style="font-family: 'Alegreya Sans SC', sans-serif; font-size:25px;">Location:
                    {{ $data->location }} </p>
                <p class="mt-1" style="font-family: 'Alegreya Sans SC', sans-serif; font-size: 25px;">
                    Date: {{ date('F d, Y', strtotime($data->date)) }}
                </p>
                <h4 style="font-family: 'Bubblegum Sans', cursive; font-size:60px;" class="mt-4">See You There!</h4>
            </div>
        </div>
    @endforeach

    @include('user.bansud.footer')

    <script src="../dash/assets/js/jquery-3.5.1.min.js"></script>

    <script src="../dash/assets/js/bootstrap.bundle.min.js"></script>

    <script src="../dash/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../dash/assets/vendor/wow/wow.min.js"></script>

    <script src="../dash/assets/js/theme.js"></script>

</body>

</html>
