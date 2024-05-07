<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('user/images/goyddbgfinalogo.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Approved Registration</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/dist/css/app.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    @include('pydc.mobile')
    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        @include('pydc.sidebar')
        <div class="content">
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Super Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Approved Registration</li>
                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
            </div>
            <div class="body-top mt-2" style="display: flex; justify-content:space-between;">
                <form action="{{ route('approved') }}" type="GET">
                    <input type="search" name="users" placeholder="Search Profile" autocomplete="off" class="rounded"
                        style="color:rgb(80, 91, 91);">
                    <button class="btn btn-success mt-1"><i class="fa fa-search"></i></button>
                </form>
                <button onclick="printTable()" class="btn btn-success"><i class="fa fa-print text-dark"
                        style="font-size: 40px"></i></button>
                <!-- Modal Toggle Button -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOrganizationModal">Add
                    Organization</button>
                <!-- Modal -->
                <div class="modal fade" id="addOrganizationModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Organization</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Organization Form -->
                                <form id="organizationForm" action="{{ route('add.organization') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="organizationName">Organization Name</label>
                                        <input type="text" class="form-control" id="organizationName"
                                            name="organizationName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <table class="table" id="tablePrint" style="border: 2px grey solid; margin-top: 40px;">
                <thead>
                    <tr>
                        <th>URN</th>
                        <th>Organization Name</th>
                        <th>Date Approved</th>
                        <th>Status</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No data available</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="admin/dist/js/app.js"></script>
    <script src="{{ asset('admin/dist/js/app.js') }}"></script>
</body>

</html>
