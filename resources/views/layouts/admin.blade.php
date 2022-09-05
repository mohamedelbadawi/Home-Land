<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Analytics Dashboard</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico" />
    <link href="{{ asset('assets/back/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/back/js/loader.js') }}"></script>
    <link href="{{ asset('assets/back/css/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/back/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('asset/back/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/back/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"
        class="dashboard-analytics" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back/datatable/dt-global_style.cs') }}">
    <link href="{{ asset('assets/back/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back/css/bootstrap-select.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back/datatable/dt-global_style.css') }}">
</head>

<body class="dashboard-analytics">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('layouts.partials.admin_nav')
    <!--  END NAVBAR  -->
    <!-- BEGIN SIDEBAR -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div id="content" class="main-content">
            @include('layouts.partials.admin_side')
            <!-- END SIDEBAR -->
        
            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
            @yield('content')
        </div>
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/back/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/back/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/back/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/back/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/back/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/back/js/bootstrap-select.min.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/back/js/dashboard/dash_1.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/back/datatable/datatables.js') }}"></script>
    <script src="{{ asset('assets/back/js/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js"
        type="text/javascript"></script>
    @yield('js')
</body>

</html>
