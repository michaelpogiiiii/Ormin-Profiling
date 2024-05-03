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
        /* Modal for Registration */
        .event-modal {
            display: none;
            position: fixed;
            z-index: 2;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);

        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid grey;
            width: 900px;

        }

        .close {
            color: black;
            float: right;
            font-size: 30px;
            font-weight: bolder;
            cursor: pointer;
        }

        .user-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 700px;
            max-width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form Styles */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        /* Table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .folder {
            display: flex;
            flex-wrap: wrap;
        }

        .folder-box {
            width: 180px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            background-color: #f9f9f9;
        }

        .folder-box i {
            font-size: 20px;
            color: #555;
            margin-bottom: 5px;
        }

        .folder-box p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .folder-box i.fa-folder {
            /* Add custom styles for the folder icon if needed */
        }

        .folder-box i.fa-ellipsis-v {
            /* Add custom styles for the ellipsis icon if needed */
        }

        .fa-trash:hover {
            color: red;
        }

        .fa-download:hover {
            color: green;
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
                        <li class="breadcrumb-item"><a href="/home">Super Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Monitoring Report</li>
                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="mon-report mt-5">
                <div class="mt-3 d-flex justify-content-between">
                    <h3 style="font-size:30px;font-weight:700;">Monitoring Report</h3>
                    <div>
                        <form action="{{ url('monitoring-report') }}" type="GET">
                            <input type="search" name="file" placeholder="Search File" autocomplete="off"
                                class="rounded" style="color:rgb(80, 91, 91);" oninput="delayedSubmit(this)">
                            <button class="btn btn-success mt-1"><i class="fa fa-search"></i></button>
                        </form>
                        <form action="{{ url('monitoring-report') }}" type="GET" id="searchForm">
                            <select name="municipal" id="municipal" class="border-success rounded">
                                <option>Select Municipality</option>
                                <option value="">All</option>
                                <option value="Baco">Baco</option>
                                <option value="Bansud">Bansud</option>
                                <option value="Bongabong">Bongabong</option>
                                <option value="Bulalacao">Bulalacao</option>
                                <option value="Calapan">Calapan</option>
                                <option value="Gloria">Gloria</option>
                                <option value="Mansalay">Mansalay</option>
                                <option value="Naujan">Naujan</option>
                                <option value="Pinamalayan">Pinamalayan</option>
                                <option value="Pola">Pola</option>
                                <option value="Puerto">Puerto</option>
                                <option value="Roxas">Roxas</option>
                                <option value="Socorro">Socorro</option>
                                <option value="Teodoro">San Teodoro</option>
                                <option value="Victoria">Victoria</option>
                            </select>
                            <button class="btn btn-outline-success mt-1" hidden>Search</button>
                        </form>
                    </div>
                </div>

                {{-- Message --}}
                @if (session()->has('message'))
                    <div class="alert alert-success mt-3">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger mt-3">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session()->get('error') }}
                    </div>
                @endif

                @if ($paginator->isEmpty())
                    <div class="text-center mt-5">
                        No report available.
                    </div>
                @else
                    <div class="folder mt-4">
                        @foreach ($paginator as $report)
                            <div class="folder-box" style="position: relative;">
                                <i class="fa fa-folder text-primary mr-4" style="font-size:100px"></i>
                                <div class="btns"
                                    style="position: absolute; top:10px; right:10px; display:none;flex-direction:column; ">
                                    <a href="{{ url('download-mon', [$report->id, $report->municipality]) }}"
                                        class="text-secondary" download><i class="fa fa-download"
                                            style=" font-size:20px;"></i>
                                    </a>
                                    <a href="{{ url('delete-mon', [$report->id, $report->municipality]) }}"
                                        class="text-secondary mt-2" onclick="return confirm('Delete Report?')">
                                        <i class="fa fa-trash" style="font-size:20px;"></i>
                                    </a>
                                </div>
                                <p>{{ $report->municipality }}</p>
                                <p>{{ $report->file }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{ $paginator->links() }}
                @endif
            </div>


        </div>
        <!-- END: Content -->
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="admin/dist/js/app.js"></script>

    <script>
        const boxElements = document.querySelectorAll('.folder-box');

        boxElements.forEach(function(box) {
            const btns = box.querySelector('.btns');

            box.addEventListener('mouseover', function() {
                btns.style.display = 'flex';
            });
            box.addEventListener('mouseout', function() {
                btns.style.display = 'none';
            });
        });
    </script>

    <script>
        // Get the form and select element by their IDs
        var form = document.getElementById('searchForm');
        var select = document.getElementById('municipal');

        // Add event listener to the select element
        select.addEventListener('change', function() {
            // Submit the form
            form.submit();
        });
    </script>
    <!-- END: JS Assets-->
</body>

</html>
