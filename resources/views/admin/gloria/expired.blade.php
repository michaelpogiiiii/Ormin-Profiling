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
    <title> Expired Organization List </title>
    <!-- BEGIN: CSS Assets-->
    <!-- CSS -->
    <!-- CSS -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>

    <link rel="stylesheet" href="admin/dist/css/app.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px gray;
            text-align: left;
            padding: 8px;
            text-align: center;
            background-color: white;
        }

        th {
            background-color: green;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>

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
                        <li class="breadcrumb-item"><a href="#">Gloria Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Expired Organization List </li>
                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="body-top mt-2" style="display: flex; justify-content:space-between;">
                <form action="{{ url('gloria_expired') }}" type="GET">
                    <input type="search" name="users" placeholder="Search Profile" autocomplete="off" class="rounded"
                        style="color:rgb(80, 91, 91);">
                    <button class="btn btn-success mt-1"><i class="fa fa-search"></i></button>
                </form>
                <button onclick="printTable()" class="btn btn-success"> <i class="fa fa-print text-dark"
                        style="font-size: 40px"></i> </button>
                </div>
                <table class="table" id="tablePrint" style= "border: 2px grey solid; margin-top: 40px">
                <tbody>
                <thead>
                    <tr>
                        <th>Registration Expired</th>
                        <th>Organization Name</th>
                        <th>Date Approved</th>
                        <th>No. of Members</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tr>
                        <td colspan="7">No data available</td>
                        </tr>
                </table>
</div>
         </div>
         
    </div>
    <script src="admin/dist/js/app.js"></script>
</body>
</html>