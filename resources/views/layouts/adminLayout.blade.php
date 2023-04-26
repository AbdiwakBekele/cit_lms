<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{ asset('assets/admin/images/wAsset 3@300x.png') }}" type="image/png" />
        <!--plugins-->
        <link href="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }} " rel="stylesheet" />
        <link href=" {{ asset('assets/admin/plugins/simplebar/css/simplebar.css') }} " rel="stylesheet" />
        <link href="{{ asset('assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
        <!-- loader-->
        <link href="{{ asset('assets/admin/css/pace.min.css') }} " rel="stylesheet" />
        <script src="{{ asset('assets/admin/js/pace.min.js') }} "></script>
        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/admin/css/bootstrap-extended.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/admin/css/icons.css') }} " rel="stylesheet">
        <!-- Theme Style CSS -->
        <link rel="stylesheet" href=" {{ asset('assets/admin/css/dark-theme.css') }} " />
        <link rel="stylesheet" href=" {{ asset('assets/admin/css/semi-dark.css') }} " />
        <link rel="stylesheet" href=" {{ asset('assets/admin/css/header-colors.css') }} " />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>@yield('title')</title>
        @yield('styles')
    </head>

    <body>
        <!--wrapper-->
        <div class="wrapper">
            <!-- Side Navigation Bar -->
            @include('include.adminSideBar')


            <!-- Top Navigation -->
            @include('include.adminNav')

            <!--start page wrapper -->
            <div class="page-wrapper">
                @yield('content')
            </div>


            <div class="overlay toggle-icon"></div>

            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            @include('include.adminFooter')
        </div>


        <!--end switcher-->
        <!-- Bootstrap JS -->
        <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <!--plugins-->
        <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/simplebar/js/simplebar.min.js') }} "></script>
        <script src="{{ asset('assets/admin/plugins/metismenu/js/metisMenu.min.js') }} "></script>
        <script src="{{ asset('assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }} "></script>
        <script src="{{ asset('assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }} "></script>
        <script src="{{ asset('assets/admin/plugins/chartjs/js/chart.js') }} "></script>
        <script src="{{ asset('assets/admin/js/index.js') }} "></script>
        <!--app JS-->
        <script src="{{ asset('assets/admin/js/app.js') }}"></script>
        <script>
        new PerfectScrollbar(".app-container")
        </script>
    </body>

</html>