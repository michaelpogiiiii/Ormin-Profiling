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
    <title>Gloria</title>
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


    <style>
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
    </style>
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">

    @include('admin.gloria.mobile')

    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        @include('admin.gloria.sidebar')

        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Gloria</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registered Profiles</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
            </div>

            <form action="{{ url('gloriaprofile') }}" type="GET">
                <input type="search" name="users" placeholder="Search Profile" autocomplete="off" class="rounded"
                    style="color:rgb(80, 91, 91);" oninput="delayedSubmit(this)">
                <button class="btn btn-success mt-1"><i class="fa fa-search"></i></button>
            </form>
            <!-- END: Top Bar -->
            <div class="mt-3">
                <a href="{{ url('gloria-inactive') }}" class="btn btn-danger">View Inactive Profiles</a>
            </div>
            @php
                use Carbon\Carbon;
                $currentDate = Carbon::now();
                $filteredProfiles = $gloria_profiles->filter(function ($data) use ($currentDate) {
                    $birthdate = Carbon::parse($data->bday);
                    $age = $birthdate->diffInYears($currentDate);
                    return $age < 31;
                });
            @endphp

            @if ($filteredProfiles->isEmpty())
                <table class="mt-5" id="responsive-table">
                    <tr>
                        <td colspan="7">No data available</td>
                    </tr>
                </table>
            @else
                <table class="mt-5" id="responsive-table">
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Youth Classification</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Action</th>
                    </tr>
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
                                <a href="{{ url('gloria-profile', $data->id) }}" class="btn btn-success">
                                    <i class="fa fa-info-circle" style="color: white; font-size: 15px;"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
            {{ $gloria_profiles->links() }}




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
        let timeoutId;

        function delayedSubmit(input) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                input.form.submit();
            }, 500);
        }
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
