<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="admin/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Baco</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="admin/dist/css/app.css" />
    <!-- END: CSS Assets-->

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
    <style>
        .dashboard {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
            /* Added flex-wrap property to wrap items in multiple rows */
        }


        .dashboard>div {
            border-radius: 10px;
            box-sizing: border-box;
            border: 1px solid #d8d3d3;
            box-shadow: 0 2px 4px rgba(127, 125, 125, 0.1);
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            text-align: center;
            font-family: Arial, sans-serif;
            width: 280px;
        }

        .dashboard div p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .dashboard div i {
            font-size: 24px;
            color: #555;
            margin-bottom: 10px;
        }

        .dashboard div a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .dashboard div a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">

    @include('admin.baco.mobile')

    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        @include('admin.baco.sidebar')

        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Baco</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="dashboard mt-5">
                <div class="up-event">
                    <div style="display: flex; justify-content:space-between; width:95%; margin:auto;height:70px;">
                        <p class="text-muted">Event <br><span>(Upcoming)</span></p>
                        <p style="background-color: rgb(171, 255, 222);border-radius:20px;"><i
                                class="fa fa-calendar p-3"
                                style="font-size:30px;width:100px;color:rgb(10, 159, 5);"></i></p>
                    </div>
                    <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $event_inc }} </p>
                    <a href="/baco-incoming-event" class="btn btn-success">View</a>
                </div>

                <div class="pst-event">
                    <div style="display: flex; justify-content:space-between; width:95%; margin:auto;height:70px;">
                        <p class="text-muted">Event <br> <span>(Past)</span></p>
                        <p style="background-color: rgb(171, 255, 222);border-radius:20px;"><i
                                class="fa fa-calendar-times-o p-3"
                                style="font-size:30px;width:100px;color:rgb(10, 159, 5);"></i></p>
                    </div>
                    <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $event_pst }} </p>
                    <a href="/baco-past-event" class="btn btn-success">View</a>
                </div>

                <div class="act-profile">
                    <div style="display: flex; justify-content:space-between; width:95%; margin:auto;height:70px;">
                        <p class="text-muted">Profile <br><span>(Active)</span></p>
                        <p style="background-color: rgb(171, 255, 222);border-radius:20px;"><i class="fa fa-user p-3"
                                style="font-size:30px;width:100px;color:rgb(10, 159, 5);"></i></p>
                    </div>
                    <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $active_profile }}
                    </p>
                    <a href="/bacoprofile" class="btn btn-success">View</a>
                </div>

                <div class="inc-profile">
                    <div style="display: flex; justify-content:space-between; width:95%; margin:auto;height:70px;">
                        <p class="text-muted">Profile <br><span>(Inactive)</span></p>
                        <p style="background-color: rgb(171, 255, 222);border-radius:20px;"><i
                                class="fa fa-user-times p-3"
                                style="font-size:30px;width:100px;color:rgb(10, 159, 5);"></i></p>
                    </div>
                    <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $inc_profile }} </p>
                    <a href="/baco-inactive" class="btn btn-success">View</a>
                </div>

                <div class="acc-report">
                    <div style="display: flex; justify-content:space-between; width:95%; margin:auto;height:70px;">
                        <p class="text-muted">Accomplishment <br><span>(Report)</span></p>
                        <p style="background-color: rgb(171, 255, 222);border-radius:20px;"><i class="fa fa-file-text-o p-3"
                                style="font-size:30px;width:100px;color:rgb(10, 159, 5);"></i></p>
                    </div>
                    <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $acc }} </p>
                    <a href="/baco-accomplishment-report" class="btn btn-success">View</a>
                </div>
    
                <div class="mon-report">
                    <div style="display: flex; justify-content:space-between; width:95%; margin:auto;height:70px;">
                        <p class="text-muted">Monitoring <br><span>(Report)</span></p>
                        <p style="background-color: rgb(171, 255, 222);border-radius:20px;"><i class="fa fa-file-text-o p-3"
                                style="font-size:30px;width:100px;color:rgb(10, 159, 5);"></i></p>
                    </div>
                    <p class="p-4" style="font-family: 'Abel', sans-serif;font-size:35px;"> {{ $mon }} </p>
                    <a href="/baco-monitoring-report" class="btn btn-success">View</a>
                </div>
            </div>

            


        </div>
        <!-- END: Content -->
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"}&libraries=places"></script>
    <script src="admin/dist/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>
