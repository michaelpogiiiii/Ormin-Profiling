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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>
    <link rel="stylesheet" href="admin/dist/css/app.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- END: CSS Assets-->
    <style>
 

        table {

            width: 100%;
            font-family: sans-serif;
            font-weight: 100;
            border-collapse: collapse;
            width: 100%;
           
            overflow: hidden;
            box-shadow: -6px -6px 10px #f9f9f9,
                         6px 6px 10px #00000026;
        }

        th,
        td {
            background-color: white;
         padding: 15px;
         color: black;
         text-align: center;
         border-color: gray;
        }

        th {
            background-color: green;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #ffffff4d;
        }
        tbody td:hover:before {
            content: "";
            position: absolute;
            background-color: #ffffff33;
            left: 0;
            right: 0;
            top: -9999px;
            bottom: -9999px;
            z-index: -1;
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
                        <li class="breadcrumb-item"><a href="#">Provincial Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registered Profiles > <span
                                class="text-danger">Inactive</span></li>
                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="body-top mt-2" style="display: flex; justify-content:space-between;">
            <form action="{{ url('inactive-profile') }}" type="GET" class="search-form">
                <div class="search-container">
                <input type="search" name="users" placeholder="Search Profile" autocomplete="off" class="rounded search-input" style="color:rgb(80, 91, 91);">
                <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                </div>
            </form>

                <form action="{{ url('inactive-profile') }}" type="GET" id="searchForm">
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
            <div>
                <a href="{{ url('adminprofile') }}" class="btn btn-success mt-3">View Active Profiles</a>
            </div>
            @php
                use Carbon\Carbon;
                $currentDate = Carbon::now();
                $filteredProfiles = $paginator->filter(function ($data) use ($currentDate) {
                    $birthdate = Carbon::parse($data->bday);
                    $age = $birthdate->diffInYears($currentDate);
                    return $age > 30;
                });
            @endphp

            <table class="table mt-5" id="responsive-table">
                <tr>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Youth Classification</th>
                    <th>Municipality</th>
                    <th>Barangay</th>
                    <th>Action</th>
                </tr>
                @if ($filteredProfiles->isEmpty())
                    <tr>
                        <td colspan="7">No data available</td>
                    </tr>
                @else
                    @foreach ($filteredProfiles as $data)
                        @php
                            $birthdate = Carbon::parse($data->bday);
                            $age = $birthdate->diffInYears($currentDate);
                        @endphp
                        <tr>
                            <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                            <td>{{ $age }}</td>
                            <td>{{ $data->sex }}</td>
                            <td>{{ $data->youthclass }}</td>
                            <td>{{ $data->municipality }}</td>
                            <td>{{ $data->barangay }}</td>
                            <td>
                                <a href="{{ url('view-inactive', [$data->id,  $data->municipality]) }}"
                                    class="btn btn-success">
                                    <i class="fa fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $paginator->links() }}



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
        // Get the form and select element by their IDs
        var form = document.getElementById('searchForm');
        var select = document.getElementById('municipal');

        // Add event listener to the select element
        select.addEventListener('change', function() {
            // Submit the form
            form.submit();
        });
    </script>

    <script>
        function removeResponsiveClass() {
            const table = document.getElementById('responsive-table');
            if (table.classList.contains('table-responsive')) {
                table.classList.remove('table-responsive');
            }
        }

        function addResponsiveClass() {
            const table = document.getElementById('responsive-table');
            if (!table.classList.contains('table-responsive')) {
                table.classList.add('table-responsive');
            }
        }

        function checkScreenSize() {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 767) {
                addResponsiveClass();
            } else {
                removeResponsiveClass();
            }
        }

        window.addEventListener('DOMContentLoaded', function() {
            checkScreenSize();
        });

        window.addEventListener('resize', function() {
            checkScreenSize();
        });
    </script>
</body>

</html>
