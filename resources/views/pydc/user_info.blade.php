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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>

    <!-- END: CSS Assets-->
    <style>
        table {
            border: 3px solid black;
            border-collapse: collapse;
            width: 100%;
            border-radius: 15px; 
            overflow: hidden; 
            box-shadow: -6px -6px 10px #f9f9f9,
                         6px 6px 10px #00000026;
        }

        th,
        td {
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
            border: 2px solid grey;
        }

        /* Modal for Registration */
        .user-modal {
            display: none;
            position: fixed;
            z-index: 1;
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
            width: 500px;

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

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .fa-eye-slash {
            display: none;
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



        button.btn-success {
            margin-top: 10px;
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
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            @include('pydc.add-user')

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
            <table class="mt-5" id="responsive-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $superadmin)
                    <tr>
                        <td> {{ $superadmin->name }} </td>
                        <td> {{ $superadmin->email }} </td>
                        <td>
                            @php
                                $usertypes = [
                                    1 => 'Super Admin',
                                    2 => 'Baco Admin',
                                    3 => 'Bansud Admin',
                                    4 => 'Bongabong Admin',
                                    5 => 'Bulalacao Admin',
                                    6 => 'Calapan Admin',
                                    7 => 'Gloria Admin',
                                    8 => 'Mansalay Admin',
                                    9 => 'Naujan Admin',
                                    10 => 'Pinamalayan Admin',
                                    11 => 'Pola Admin',
                                    12 => 'Puerto Admin',
                                    13 => 'Roxas Admin',
                                    14 => 'SanTeodoro Admin',
                                    15 => 'Socorro Admin',
                                    16 => 'Victoria Admin',
                                ];
                            @endphp

                            {{ $usertypes[$superadmin->usertype] ?? '' }}
                        </td>

                        <td>
                            @if ($superadmin->id == Auth::user()->id)
                                <span class="text-success">Current User</span>
                            @else
                                <a href="{{ url('delete-user', $superadmin->id) }}"
                                    onclick="return confirm('Delete this user?')" class="btn btn-danger">
                                    <i class="fa fa-trash" style="font-size: 15px"></i>
                                </a>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </table>
            {{ $users->links() }}


        </div>
        <!-- END: Content -->
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="admin/dist/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <script>
        // get Modal
        const userModal = document.getElementById('user-modal');

        // get btn that opens Reg Form Modal
        const btn = document.getElementById('adduserbtn');

        // get the btn that closes Modal
        const span = document.getElementById('closebtn');

        // Function that Opens Modal
        function addUser() {
            userModal.style.display = 'block';
        }

        // Function that closes Modal
        function closeModal() {
            userModal.style.display = 'none';
        }

        // Close the reg form modal when the user clicks the span element
        span.onclick = closeModal;

        // Close the modal when the user clicks anywhere outside of it
        window.onclick = function(event) {
            if (event.target == userModal) {
                closeModal();
            }
        };
    </script>
    <!-- END: JS Assets-->
</body>

</html>
