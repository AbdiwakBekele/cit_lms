<!DOCTYPE html>
<html>

    <head>
        <!-- set the encoding of your site -->
        <meta charset="utf-8">
        <!-- set the viewport width and initial-scale on mobile devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- set the HandheldFriendly -->
        <meta name="HandheldFriendly" content="True">
        <!-- set the description -->
        <meta name="description" content="CTI LMS">
        <!-- set the Keyword -->
        <meta name="keywords" content="">
        <meta name="author" content="CTI LMS">
        <!-- include google roboto font cdn link -->
        <link rel="shortcut icon" href=" {{ asset('images/wAsset 3@300x.png') }} " type="image/x-icon">
        <link
            href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
            rel="stylesheet">
        <!-- include the site bootstrap stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/bootstrap.css') }} ">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/plugins.css') }} ">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/colors.css') }} ">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href=" {{ asset('style.css') }}  ">
        <!-- include the site responsive stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/responsive.css') }} ">
        <title>@yield('title')</title>
        @yield('style')
    </head>

    <body>
        <!-- main container of all the page elements -->
        <div id="wrapper">
            <!-- header of the page -->

            @include('include.studentNav')

            <!-- contain main informative part of the site -->
            <main id="main">
                @yield('content')

            </main>

            <!-- footer area container -->
            @include('include.studentFooter', ['footerCourses'=> $courses])

            <!-- back top of the page -->
            <span id="back-top" class="text-center fa fa-caret-up"></span>
            <!-- loader of the page -->
            <div id="loader" class="loader-holder">
                <div class="block"><img src="images/svg/hearts.svg" width="100" alt="loader"></div>
            </div>
        </div>

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}  "></script>
        <script src="{{ asset('js/jquery.main.js') }} "></script>
        <script type="text/javascript" src=" {{ asset('js/init.js') }} "></script>
    </body>

</html>