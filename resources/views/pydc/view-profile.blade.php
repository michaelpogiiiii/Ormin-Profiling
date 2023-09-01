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
    <base href="/public">
    <title>Admin</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="admin/dist/css/app.css" />
    <!-- END: CSS Assets-->

    <style>
        .text-center {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .resident-info {
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 5rem;
        }

        .resident-info h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .resident-info h3 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .resident-info p {
            font-size: 1.2rem;
            margin-bottom: 0.2rem;
        }

        .resident-info p:last-child {
            margin-bottom: 1rem;
        }

        .resident-info .box {
            background-color: #f5f5f5;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.472);
        }

        .resident-info .voted {
            margin-top: 0.5rem;
            margin-left: 1rem;
            font-size: 1rem;
        }

        .resident-info .assembly {
            margin-top: 0.5rem;
            margin-left: 1rem;
            font-size: 1rem;
        }

        p {
            padding: 1px;
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
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile > <span
                                style="color:blue;">Info</span></li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="resident-info mt-5">
                <h1 class="text-center">Profile Information</h1>

                @foreach ($filteredProfiles as $data)
                    <div class="box">
                        <p>Full Name: {{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}
                            {{ $data->suffix }}</p>
                        <p>Sex: {{ $data->sex }}</p>
                        <p>Birthday: {{ $data->bday }}</p>
                        <p>Age: {{ $data->age }}</p>
                        <p>Address: {{ $data->barangay }}, {{ $data->municipality }}, {{ $data->province }} </p><br><br>

                        <p>Civil Status: {{ $data->status }}</p>
                        <p>Youth Classification: {{ $data->youthclass }}</p>
                        <p>Work Status: {{ $data->workstat }}</p>
                        <p>Educational Background: {{ $data->educback }}</p>
                        <p>Registered SK Voter: {{ $data->skvoter }}</p>

                        @if ($data->skvoter == 'Yes')
                            <p>Voted Last SK Election: {{ $data->skvoterlast }}</p>
                        @endif

                        <p>Registered National Voter: {{ $data->nationalvoter }}</p>

                        <p>Attended KK Assembly: {{ $data->assembly }}
                            @if ($data->assembly == 'Yes')
                                ({{ $data->assembly_attend }})
                            @else
                                ({{ $data->assembly_noattend }})
                            @endif
                        </p>
                    </div>
                @endforeach
                <a href="{{ url('/adminprofile') }}" class="btn btn-success">Back</a>
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
</body>

</html>
