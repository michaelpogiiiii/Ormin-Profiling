<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="user/images/goyddbgfinalogo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Admin</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="admin/dist/css/app.css" />
    {{-- FontAwesome --}}

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&display=swap" rel="stylesheet">
    <!-- END: CSS Assets-->

    {{-- Animate Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">

    <style>
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;

        }

        .container-all {
            width: 50%;
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .container-ind {
            width: 50%;
        }
        
        .container-ind>div {
            border-radius: 10px;
            box-sizing: border-box;
            border: 1px solid #d8d3d3;
            box-shadow: 0 2px 4px rgba(180, 174, 174, 0.1);
            padding: 10px;
            margin-left: 20px;
            background-color: #fff;
            font-family: Arial, sans-serif;
            width: 100%;
            height: auto;
        }


        .container-all>div {
            border-radius: 0.375rem;
            box-sizing: border-box;
            border-color: transparent;
            --tw-bg-opacity: 1;
            box-shadow: 0px 3px 20px #0000000b;
            position: relative;
            padding: 20px;
            margin-bottom: 10px;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
            text-align: center;
            font-family: Arial, sans-serif;
            width: 200px;
            height: 210px;

     
        }
     
        .container-all div p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .container-all div i {
            font-size: 24px;
            color: #555;
            margin-bottom: 10px;
        }

        .container-all div a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition:  0.3s ease;
        }

        .container-all div a:hover {
            background-color: #45a049;
        }

        .variable-name {
            display: inline-block;
            width: 150px;
            /* Adjust the width as needed */
        }

        .variable-value {
            display: inline-block;
            width: 50px;
            /* Adjust the width as needed */
            text-align: right;
        }
        .btn{
            background-color: #efefef;
            border: none;
            border-radius: 25px;
            color: #424242;
            box-shadow: -6px -6px 10px #f9f9f9,
                         6px 6px 10px #00000026;
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">

    @include('pydc.mobile')

    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        @include('pydc.sidebar')

        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Provincial Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="dashboard mt-2 container-fluid">
              
                <div class="container-all ">
                    <div class="act-profile" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start;height:70px">
                            <p class="text-muted">Youth Profiles <br><span>(Active)</span></p>
                            <p
                                style="border-radius:10px;position:absolute;top:0;right:0;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="font-size:25px;width:30px;margin-top:20px; margin-right:15px; color:rgb(10, 159, 5);">
                                     <!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                                    <path fill="#0a9f05" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                                </svg>

                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;">
                            {{ $active_profiles }}
                        </p>
                        <button class="btn btn-success" id="actBtn">View</button>
                    </div>

                    <div class="inc-profile" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Youth Profiles <br><span>(Inactive)</span></p>
                            <p
                                style="border-radius:10px;position:absolute;top:0;right:0;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="font-size:25px;width:30px;margin-top:20px; margin-right:15px; color:rgb(10, 159, 5);">
                                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#0a9f05" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM472 200H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H472c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                                </svg>


                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;">
                            {{ $inactive_profiles }}
                        </p>
                        <button class="btn btn-success" id="incBtn">View</button>
                    </div>

                    <div class="inc-profile" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Youth Org. <br><span>(Disapproved)</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class="fa fa-thumbs-down p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;">
                            {{ $inactive_profiles }}
                        </p>
                        <button class="btn btn-success" id="incBtn">View</button>
                    </div>

                    <div class="inc-profile" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Youth Org. <br><span>(Approved)</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class=" fa fa-thumbs-up  p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;">
                            {{ $inactive_profiles }}
                        </p>
                        <button class="btn btn-success" id="incBtn">View</button>
                    </div>

                    <div class="inc-profile" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Youth Org. <br><span>(Waitlist)</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class="fa fa-clock-o p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;">
                            {{ $inactive_profiles }}
                        </p>
                        <button class="btn btn-success" id="incBtn">View</button>
                    </div>

                    <div class="inc-profile" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Youth Org. <br><span>(Expired)</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class="fa fa-user-times p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;">
                            {{ $inactive_profiles }}
                        </p>
                        <button class="btn btn-success" id="incBtn">View</button>
                    </div>

                    <div class="up-event" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Events <br><span>(Upcoming)</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class="fa fa-calendar p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $incoming_event }}
                        </p>
                        <button class="btn btn-success" id="upBtn">View</button>
                    </div>

                    <div class="up-event" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Events <br><span>(Current)</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="font-size:25px;width:30px;margin-top:20px; margin-right:15px; color:rgb(10, 159, 5);">
                                <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="rgb(10, 159, 5)" d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                                </svg>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $incoming_event }}
                        </p>
                        <button class="btn btn-success" id="upBtn">View</button>
                    </div>

                    <div class="pst-event" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Events <br> <span>(Past)</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class="fa fa-calendar-times-o p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $pst_event }}
                        </p>
                        <button class="btn btn-success" id="pastBtn">View</button>
                    </div>

                    <div class="pst-event" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px">
                            <p class="text-muted">Accomp.  <br> <span>Report</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class="fa fa-file-text-o p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $total_acc }}
                        </p>
                        <button class="btn btn-success" id="accBtn">View</button>
                    </div>

                    <div class="pst-event" style="position:relative;background-color: #fff;box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);">
                        <div style="display: flex; justify-content:start; width:95%; margin:auto;height:70px;">
                            <p class="text-muted">Monitoring <br> <span>Report</span></p>
                            <p
                                style="border-radius:20px;position:absolute;top:0;right:0;">
                                <i class="fa fa-file-text-o p-3"
                                    style="font-size:25px;width:70px;color:rgb(10, 159, 5);"></i>
                            </p>
                        </div>
                        <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $total_mon }}
                        </p>
                        <button class="btn btn-success" id="monBtn">View</button>
                    </div>
                </div>
         

                <div class="container-ind">
                    <div class="container-profile">
                        <div class="profile-active animate__animated animate__bounceInRight" style="display: none">
                            <h1 class="text-center1" style="font-family: 'Nunito', sans-serif; font-size: 40px;">Active
                                Profiles</h1>
                            <div style="display: flex; flex-wrap: wrap;">
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Baco">Baco:</a></span>
                                        <span class="variable-value">{{ $bacoActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Bansud">Bansud:</a></span>
                                        <span class="variable-value">{{ $bansudActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Bongabong">Bongabong:</a></span>
                                        <span class="variable-value">{{ $bongabongActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Bulalacao">Bulalacao:</a></span>
                                        <span class="variable-value">{{ $bulalacaoActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Calapan">Calapan:</a></span>
                                        <span class="variable-value">{{ $calapanActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Gloria">Gloria:</a></span>
                                        <span class="variable-value">{{ $gloriaActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Mansalay">Mansalay:</a></span>
                                        <span class="variable-value">{{ $mansalayActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Naujan">Naujan:</a></span>
                                        <span class="variable-value">{{ $naujanActive }}</span>
                                    </li>
                                </ul>
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Pinamalayan">Pinamalayan:</a></span>
                                        <span class="variable-value">{{ $pinamalayanActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Pola">Pola:</a></span>
                                        <span class="variable-value">{{ $polaActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Puerto">Puerto:</a></span>
                                        <span class="variable-value">{{ $puertoActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Roxas">Roxas:</a></span>
                                        <span class="variable-value">{{ $roxasActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Socorro">Socorro:</a></span>
                                        <span class="variable-value">{{ $socorroActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a href="/adminprofile?municipal=Teodoro">San
                                                Teodoro:</a></span>
                                        <span class="variable-value">{{ $teodoroActive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/adminprofile?municipal=Victoria">Victoria:</a></span>
                                        <span class="variable-value">{{ $victoriaActive }}</span>
                                    </li>
                                </ul>


                            </div>
                        </div>
                        <div class="profile-inactive animate__animated animate__bounceInRight" style="display: none;">
                            <h1 class="text-center1" style="font-family: 'Nunito', sans-serif; font-size: 40px;">
                                Inactive Profiles</h1>
                            <div style="display: flex; flex-wrap: wrap;">
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Baco">Baco:</a></span>
                                        <span class="variable-value">{{ $bacoInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Bansud">Bansud:</a></span>
                                        <span class="variable-value">{{ $bansudInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Bongabong">Bongabong:</a></span>
                                        <span class="variable-value">{{ $bongabongInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Bulalacao">Bulalacao:</a></span>
                                        <span class="variable-value">{{ $bulalacaoInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Calapan">Calapan:</a></span>
                                        <span class="variable-value">{{ $calapanInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Gloria">Gloria:</a></span>
                                        <span class="variable-value">{{ $gloriaInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Mansalay">Mansalay:</a></span>
                                        <span class="variable-value">{{ $mansalayInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Naujan">Naujan:</a></span>
                                        <span class="variable-value">{{ $naujanInactive }}</span>
                                    </li>
                                </ul>
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Pinamalayan">Pinamalayan:</a></span>
                                        <span class="variable-value">{{ $pinamalayanInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Pola">Pola:</a></span>
                                        <span class="variable-value">{{ $polaInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Puerto">Puerto:</a></span>
                                        <span class="variable-value">{{ $puertoInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Roxas">Roxas:</a></span>
                                        <span class="variable-value">{{ $roxasInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Socorro">Socorro:</a></span>
                                        <span class="variable-value">{{ $socorroInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a href="/inactive-profile?municipal=Teodoro">San
                                                Teodoro:</a></span>
                                        <span class="variable-value">{{ $teodoroInactive }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/inactive-profile?municipal=Victoria">Victoria:</a></span>
                                        <span class="variable-value">{{ $victoriaInactive }}</span>
                                    </li>
                                </ul>


                            </div>
                        </div>
                        <div class="upcoming-event animate__animated animate__bounceInRight" style="display: none;">
                            <h1 class="text-center1" style="font-family: 'Nunito', sans-serif; font-size: 40px;">
                                Upcoming Events</h1>
                            <div style="display: flex; flex-wrap: wrap;">
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Baco">Baco:</a></span>
                                        <span class="variable-value">{{ $baco_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Bansud">Bansud:</a></span>
                                        <span class="variable-value">{{ $bansud_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Bongabong">Bongabong:</a></span>
                                        <span class="variable-value">{{ $bongabong_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Bulalacao">Bulalacao:</a></span>
                                        <span class="variable-value">{{ $bulalacao_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Calapan">Calapan:</a></span>
                                        <span class="variable-value">{{ $calapan_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Gloria">Gloria:</a></span>
                                        <span class="variable-value">{{ $gloria_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Mansalay">Mansalay:</a></span>
                                        <span class="variable-value">{{ $mansalay_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Naujan">Naujan:</a></span>
                                        <span class="variable-value">{{ $naujan_inc }}</span>
                                    </li>
                                </ul>
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Pinamalayan">Pinamalayan:</a></span>
                                        <span class="variable-value">{{ $pinamalayan_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Pola">Pola:</a></span>
                                        <span class="variable-value">{{ $pola_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Puerto">Puerto:</a></span>
                                        <span class="variable-value">{{ $puerto_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Roxas">Roxas:</a></span>
                                        <span class="variable-value">{{ $roxas_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Socorro">Socorro:</a></span>
                                        <span class="variable-value">{{ $socorro_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Teodoro">San Teodoro:</a></span>
                                        <span class="variable-value">{{ $teodoro_inc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-upcoming-event?municipal=Victoria">Victoria:</a></span>
                                        <span class="variable-value">{{ $victoria_inc }}</span>
                                    </li>
                                </ul>



                            </div>
                        </div>
                        <div class="past-event animate__animated animate__bounceInRight" style="display: none;">
                            <h1 class="text-center1" style="font-family: 'Nunito', sans-serif; font-size: 40px;">Past
                                Events</h1>
                            <div style="display: flex; flex-wrap: wrap;">
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Baco">Baco:</a></span>
                                        <span class="variable-value">{{ $baco_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Bansud">Bansud:</a></span>
                                        <span class="variable-value">{{ $bansud_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Bongabong">Bongabong:</a></span>
                                        <span class="variable-value">{{ $bongabong_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Bulalacao">Bulalacao:</a></span>
                                        <span class="variable-value">{{ $bulalacao_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Calapan">Calapan:</a></span>
                                        <span class="variable-value">{{ $calapan_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Gloria">Gloria:</a></span>
                                        <span class="variable-value">{{ $gloria_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Mansalay">Mansalay:</a></span>
                                        <span class="variable-value">{{ $mansalay_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Naujan">Naujan:</a></span>
                                        <span class="variable-value">{{ $naujan_pst }}</span>
                                    </li>
                                </ul>
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Pinamalayan">Pinamalayan:</a></span>
                                        <span class="variable-value">{{ $pinamalayan_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Pola">Pola:</a></span>
                                        <span class="variable-value">{{ $pola_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Puerto">Puerto:</a></span>
                                        <span class="variable-value">{{ $puerto_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Roxas">Roxas:</a></span>
                                        <span class="variable-value">{{ $roxas_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Socorro">Socorro:</a></span>
                                        <span class="variable-value">{{ $socorro_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a href="/all-past-event?municipal=Teodoro">San
                                                Teodoro:</a></span>
                                        <span class="variable-value">{{ $teodoro_pst }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/all-past-event?municipal=Victoria">Victoria:</a></span>
                                        <span class="variable-value">{{ $victoria_pst }}</span>
                                    </li>
                                </ul>


                            </div>
                        </div>

                        <div class="acc-report animate__animated animate__bounceInRight" style="display: none;">
                            <h1 class="text-center1" style="font-family: 'Nunito', sans-serif; font-size: 40px;">
                                Accomplishment Report</h1>
                            <div style="display: flex; flex-wrap: wrap;">
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Baco">Baco:</a></span>
                                        <span class="variable-value">{{ $baco_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Bansud">Bansud:</a></span>
                                        <span class="variable-value">{{ $bansud_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Bongabong">Bongabong:</a></span>
                                        <span class="variable-value">{{ $bongabong_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Bulalacao">Bulalacao:</a></span>
                                        <span class="variable-value">{{ $bulalacao_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Calapan">Calapan:</a></span>
                                        <span class="variable-value">{{ $calapan_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Gloria">Gloria:</a></span>
                                        <span class="variable-value">{{ $gloria_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Mansalay">Mansalay:</a></span>
                                        <span class="variable-value">{{ $mansalay_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Naujan">Naujan:</a></span>
                                        <span class="variable-value">{{ $naujan_acc }}</span>
                                    </li>
                                </ul>
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Pinamalayan">Pinamalayan:</a></span>
                                        <span class="variable-value">{{ $pinamalayan_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Pola">Pola:</a></span>
                                        <span class="variable-value">{{ $pola_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Puerto">Puerto:</a></span>
                                        <span class="variable-value">{{ $puerto_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Roxas">Roxas:</a></span>
                                        <span class="variable-value">{{ $roxas_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Socorro">Socorro:</a></span>
                                        <span class="variable-value">{{ $socorro_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Teodoro">San Teodoro:</a></span>
                                        <span class="variable-value">{{ $teodoro_acc }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/accomplishment-report?municipal=Victoria">Victoria:</a></span>
                                        <span class="variable-value">{{ $victoria_acc }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mon-report animate__animated animate__bounceInRight" style="display: none;">
                            <h1 class="text-center1" style="font-family: 'Nunito', sans-serif; font-size: 40px;">
                                Monitoring Report</h1>
                            <div style="display: flex; flex-wrap: wrap;">
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Baco">Baco:</a></span>
                                        <span class="variable-value">{{ $baco_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Bansud">Bansud:</a></span>
                                        <span class="variable-value">{{ $bansud_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Bongabong">Bongabong:</a></span>
                                        <span class="variable-value">{{ $bongabong_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Bulalacao">Bulalacao:</a></span>
                                        <span class="variable-value">{{ $bulalacao_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Calapan">Calapan:</a></span>
                                        <span class="variable-value">{{ $calapan_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Gloria">Gloria:</a></span>
                                        <span class="variable-value">{{ $gloria_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Mansalay">Mansalay:</a></span>
                                        <span class="variable-value">{{ $mansalay_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Naujan">Naujan:</a></span>
                                        <span class="variable-value">{{ $naujan_mon }}</span>
                                    </li>
                                </ul>
                                <ul class="p-3" style="font-family: 'Heebo', sans-serif; font-size: 25px;">
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Pinamalayan">Pinamalayan:</a></span>
                                        <span class="variable-value">{{ $pinamalayan_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Pola">Pola:</a></span>
                                        <span class="variable-value">{{ $pola_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Puerto">Puerto:</a></span>
                                        <span class="variable-value">{{ $puerto_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Roxas">Roxas:</a></span>
                                        <span class="variable-value">{{ $roxas_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Socorro">Socorro:</a></span>
                                        <span class="variable-value">{{ $socorro_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a href="/monitoring-report?municipal=Teodoro">San
                                                Teodoro:</a></span>
                                        <span class="variable-value">{{ $teodoro_mon }}</span>
                                    </li>
                                    <li class="p-2">
                                        <span class="variable-name"><a
                                                href="/monitoring-report?municipal=Victoria">Victoria:</a></span>
                                        <span class="variable-value">{{ $victoria_mon }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>


        </div>
        <!-- END: Content -->
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="admin/dist/js/app.js"></script>
    <!-- END: JS Assets-->
    <script>
        const activeProfileBtn = document.getElementById('actBtn');
        const inactiveProfileBtn = document.getElementById('incBtn');
        const pastEventBtn = document.getElementById('pastBtn');
        const upcomingBtn = document.getElementById('upBtn');
        const accBtn = document.getElementById('accBtn');
        const monBtn = document.getElementById('monBtn');

        const activeProfile = document.querySelector('.profile-active');
        const inactiveProfile = document.querySelector('.profile-inactive');
        const upcomingEvent = document.querySelector('.upcoming-event');
        const pastEvent = document.querySelector('.past-event');
        const accReport = document.querySelector('.acc-report');
        const monReport = document.querySelector('.mon-report');
        activeProfileBtn.addEventListener('click', function() {
            activeProfile.style.display = 'block'
            inactiveProfile.style.display = 'none'
            pastEvent.style.display = 'none'
            upcomingEvent.style.display = 'none'
            accReport.style.display = 'none'
            monReport.style.display = 'none'
        });
        inactiveProfileBtn.addEventListener('click', function() {
            activeProfile.style.display = 'none'
            inactiveProfile.style.display = 'block'
            pastEvent.style.display = 'none'
            upcomingEvent.style.display = 'none'
            accReport.style.display = 'none'
            monReport.style.display = 'none'

        });
        pastEventBtn.addEventListener('click', function() {
            activeProfile.style.display = 'none'
            inactiveProfile.style.display = 'none'
            pastEvent.style.display = 'block'
            upcomingEvent.style.display = 'none'
            accReport.style.display = 'none'
            monReport.style.display = 'none'
        });
        upcomingBtn.addEventListener('click', function() {
            activeProfile.style.display = 'none'
            inactiveProfile.style.display = 'none'
            pastEvent.style.display = 'none'
            upcomingEvent.style.display = 'block'
            accReport.style.display = 'none'
            monReport.style.display = 'none'
        });
        accBtn.addEventListener('click', function() {
            activeProfile.style.display = 'none'
            inactiveProfile.style.display = 'none'
            pastEvent.style.display = 'none'
            upcomingEvent.style.display = 'none'
            accReport.style.display = 'block'
            monReport.style.display = 'none'
        });
        monBtn.addEventListener('click', function() {
            activeProfile.style.display = 'none'
            inactiveProfile.style.display = 'none'
            pastEvent.style.display = 'none'
            upcomingEvent.style.display = 'none'
            accReport.style.display = 'none'
            monReport.style.display = 'block'
        });
    </script>
</body>

</html>
