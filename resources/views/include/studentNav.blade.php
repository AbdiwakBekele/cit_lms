<header id="page-header" class="page-header-stick">
    <!-- top bar -->
    <div class="top-bar bg-primary ">
        <div class="container">
            <div class="row top-bar-holder">
                <div class="col-xs-9 col">
                    <!-- bar links -->
                    <ul class="font-lato list-unstyled bar-links">
                        <li>
                            <a href="tel:+251929737373">

                                <strong class="dt element-block text-capitalize hd-phone text-white">Call
                                    :</strong>
                                <strong class="dd element-block hd-phone text-white">+251 929
                                    737373</strong>
                                <i class="fas fa-phone-square hd-up-phone hidden-sm hidden-md hidden-lg"><span
                                        class="sr-only">phone</span></i>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@edu-cti.com;">
                                <strong class="dt element-block text-capitalize hd-phone text-white">Email
                                    :</strong>
                                <strong class="dd element-block hd-phone text-white">info@edu-cti.com</strong>
                                <i class="fas fa-envelope-square hd-up-phone hidden-sm hidden-md hidden-lg"><span
                                        class="sr-only">email</span></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-3 col justify-end">
                    <!-- user links -->
                    <ul class="list-unstyled user-links fw-bold font-lato">

                        @auth('student')
                        Welcome | {{auth('student')->user()->fullname}}
                        @else
                        <li><a href="/student_login">Login</a> <span class="sep">|</span>
                            <a href="/student_register">Register</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- header holder -->
    <div class="header-holder">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-xs-6 col-sm-3">
                    <div class="logo">
                        <a href="/">
                            <img class="hidden-xs" src="{{ asset('images/Asset 2@2x-8.png')}}">
                            <img class="hidden-sm hidden-md hidden-lg" src="{{ asset('images/Asset 2@2x-8.png') }}">
                        </a>
                    </div>
                </div>

                <!-- Nav -->
                <div class="col-xs-6 col-sm-9 static-block">
                    <nav id="nav" class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- navbar collapse -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <!-- main navigation -->
                            <ul class="nav navbar-nav navbar-right main-navigation font-poppins text-uppercase">
                                <li class="grow"><a href="/" style="font-size: 1.2em;">My Learning</a></li>
                                <li><a href="/course_list" style="font-size: 1.2em;">Courses</a></li>
                            </ul>
                        </div>

                        <!-- Profile Pic | Dropdown -->
                        @auth('student')
                        <li class="dropdown" style="list-style: none; padding-left: 5%;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                @if(auth('student')->user()->profile_img)
                                <img style="width:30px; height:30px; object-fit: cover;" class="rounded-circle"
                                    src=" {{ asset('student_profile/'.auth('student')->user()->profile_img) }} ">

                                @else
                                <img width="30" height="30" class="rounded-circle"
                                    src=" {{ asset('images/AM2A1021.JPG') }} ">
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/my_profile">Profile</a></li>
                                <li><a href="/my_setting">Setting</a></li>
                                <li><a href="#">Notification</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="/student_logout">Sign Out</a></li>
                            </ul>
                        </li>
                        @else

                        @endauth

                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>