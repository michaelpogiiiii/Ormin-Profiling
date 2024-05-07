<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="user/images/goyddbgfinalogo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title> Approved Registration</title>
    <!-- BEGIN: CSS Assets-->
    <!-- CSS -->
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>
    <link rel="stylesheet" href="admin/dist/css/app.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
</head>
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
                        <li class="breadcrumb-item"><a href="#">Super Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> DisApproved Org. </li>
                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="body-top mt-2" style="display: flex; justify-content:space-between;">
                <form action="{{ url('disapproved') }}" type="GET">
                    <input type="search" name="users" placeholder="Search Profile" autocomplete="off" class="rounded" style="color:rgb(80, 91, 91);">
                    <button class="btn btn-success mt-1"><i class="fa fa-search"></i></button>
                </form>
                <button onclick="printTable()" class="btn btn-success"> <i class="fa fa-print text-dark" style="font-size: 40px"></i> </button>
                <!-- BEGIN: Modal Toggle -->
                <div class="text-center"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#header-footer-modal-preview">Show Modal</button> </div> <!-- END: Modal Toggle -->
            </div>
            <!-- BEGIN: Modal Content -->
            <div class="modal fade" id="header-footer-modal-preview" tabindex="-1" role="dialog" aria-labelledby="header-footer-modal-preview-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="header-footer-modal-preview-label">Broadcast Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="modal-form">
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="text" class="form-control" id="from" placeholder="example@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <input type="text" class="form-control" id="to" placeholder="example@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Important Meeting">
                                </div>
                                <div class="form-group">
                                    <label for="has-the-words">Has the Words</label>
                                    <input type="text" class="form-control" id="has-the-words" placeholder="Job, Work, Documentation">
                                </div>
                                <div class="form-group">
                                    <label for="doesnt-have">Doesn't Have</label>
                                    <input type="text" class="form-control" id="doesnt-have" placeholder="Job, Work, Documentation">
                                </div>
                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <select class="form-control" id="size">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="send">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Modal Content -->
            <table class="table" id="tablePrint" style="border: 2px grey solid; margin-top: 40px;">
                <tbody>
                    <thead>
                        <tr>
                            <th>URN</th>
                            <th>Organization Name</th>
                            <th>Date Approved</th>
                            <th>Status</th>
                            <th class="action-column">Action</th>
                        </tr>
                    </thead>
                    <tr>
                        <td colspan="5">No data available</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- BEGIN: Script -->
    <script src="admin/dist/js/app.js"></script>
    <script>
        $(document).ready(function () {
            // Handle form submission inside modal
            $("#send").click(function () {
                // Get form data
                var formData = {
                    from: $("#from").val(),
                    to: $("#to").val(),
                    subject: $("#subject").val(),
                    hasTheWords: $("#has-the-words").val(),
                    doesntHave: $("#doesnt-have").val(),
                    size: $("#size").val()
                };

                // Perform AJAX request (Replace this with your actual AJAX request)
                $.ajax({
                    type: "POST",
                    url: "/your-endpoint",
                    data: formData,
                    success: function (response) {
                        // Handle success
                        console.log("Success:", response);
                    },
                    error: function (error) {
                        // Handle error
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
    <!-- END: Script -->
</body>
</html>
