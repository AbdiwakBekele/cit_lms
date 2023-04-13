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
        <!-- set the page title -->
        <title>California Training Institute LMS</title>
        <!-- include google roboto font cdn link -->
        <link rel="shortcut icon" href="images/wAsset 3@300x.png" type="image/x-icon">
        <link
            href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
            rel="stylesheet">
        <!-- include the site bootstrap stylesheet -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href="css/plugins.css">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href="css/colors.css">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href="style.css">
        <!-- include the site responsive stylesheet -->
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        <!-- main container of all the page elements -->
        <div id="wrapper">
            <!-- header of the page -->

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
                                            <strong
                                                class="dd element-block hd-phone text-white">info@edu-cti.com</strong>
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
                            <div class="col-xs-6 col-sm-3">
                                <!-- logo -->
                                <div class="logo">
                                    <a href="/">
                                        <img class="hidden-xs" src="images/Asset 2@2x-8.png" >
                                        <img class="hidden-sm hidden-md hidden-lg" src="images/Asset 3@300x"
                                            >
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-9 static-block">
                                <!-- nav -->
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
                                        <ul class="nav navbar-nav navbar-right main-navigation font-poppins text-uppercase"  >
                                            <li class="grow" ><a href="/" style="font-size: 1.2em;">Home</a></li>
                                            <li><a href="/about" style="font-size: 1.2em;">About us</a></li>
                                            <li><a href="/course_list" style="font-size: 1.2em;">Courses</a></li>
                                            <li><a href="/events" style="font-size: 1.2em;">Events</a></li>
                                            <li><a href="/blog" style="font-size: 1.2em;">Blog</a></li>
                                            <li><a href="/contact" style="font-size: 1.2em;">Contact</a></li>
                                        </ul>
                                    </div>
                                    
                                    <!-- Profile Pic | Dropdown -->
                                    @auth('student')
                                    <li class="dropdown" style="list-style: none; padding-left: 5%;">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img width="30"
                                                height="30" class="rounded-circle" src="images/AM2A1021.JPG"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Profile</a></li>
                                            <li><a href="/my_learning">My Learning</a></li>
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

            <!-- contain main informative part of the site -->
            <main id="main">
                <!-- heading banner -->
                <section class="heading-banner text-white " style="background:#16416E" >
                    <div class="container holder">
                        <div class="align">
                        </div>
                    </div>
                </section>
                <!-- breadcrumb nav -->
                <nav class="breadcrumb-nav">
                    <div class="container">
                        <!-- breadcrumb -->
                        <ol class="breadcrumb">
                            <li><a href="home.html">Home</a></li>
                            <li><a href="event-sigle.html">Events</a></li>
                            <li class="active">Events Single</li>
                        </ol>
                    </div>
                </nav>
                <!-- two columns -->
                <div id="two-columns" class="container">
                    <div class="row">
                        <!-- content -->
                        <article id="content" class="col-xs-12 col-md-9">
                            <!-- visualImageHolder -->
                            <div class="aligncenter visualImageHolder">
                                <img src="images/conference.jpg" alt="image description">
                                <!-- captionAddress -->
                                <address class="captionAddress bg-theme">
                                    <div class="addressColumn">
                                        <i class="far fa-clock icn text-white"></i>
                                        <strong class="title text-uppercase fw-semi element-block">Start time :</strong>
                                        <strong class="fw-normal element-block"><time datetime="2011-01-12">March 01,
                                                2023 AT 8.00 am</time></strong>
                                    </div>
                                    <div class="addressColumn">
                                        <i class="far fa-flag icn text-white"></i>
                                        <strong class="title text-uppercase fw-semi element-block">Finish time
                                            :</strong>
                                        <strong class="fw-normal element-block"><time datetime="2011-01-12">March 01,
                                                2023 AT 12.00 am</time></strong>
                                    </div>
                                    <div class="addressColumn">
                                        <i class="fas fa-map-marker-alt icn text-white"></i>
                                        <strong class="title text-uppercase fw-semi element-block">Address:</strong>
                                        <strong class="fw-normal element-block">Diamond Hotel, AA</strong>
                                    </div>
                                </address>
                            </div>
                            <h1>WordPress Theme Development with Boostrap</h1>
                            <h3 class="content-h3">Event Description</h3>
                            <p>Numbers say it all. Globally, progress in the wind sector continues to be strong with
                                increasing annual installed capacity and growing investment in the sector. In 2015
                                alone, 63,013 megawatts of wind power capacity was installed globally an annual market
                                growth of 22 percent. It is continuing its progress towards becoming a mainstream,
                                competitive and reliable power source in both developing and mature markets. In fact,
                                wind is becoming cheap enough in many places in the U.S. and around the world to compete
                                effectively with fossil fuels.</p>
                            <!-- ticketsInfoAside -->
                            <aside class="ticketsInfoAside bg-dark">
                                <!-- ticketsInfoList -->
                                <div id="defaultCountdown" class="comming-timer"></div>
                                <a href="#" class="btn btn-default btn-white text-uppercase fw-bold font-lato">buy
                                    tickets</a>
                            </aside>
                            <h3 class="content-h3">Event Content</h3>
                            <!-- eventContentTabsWrap -->
                            <div class="eventContentTabsWrap">
                                <ul class="nav nav-tabs no-shrink font-lato" role="tablist">
                                    <li role="presentation" class="active"><a href="#DiscussAbout"
                                            aria-controls="DiscussAbout" role="tab" data-toggle="tab">Discuss About</a>
                                    </li>
                                    <li role="presentation"><a href="#Participants" aria-controls="Participants"
                                            role="tab" data-toggle="tab">Participants</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="DiscussAbout">
                                        <ul class="list-unstyled listDefault">
                                            <li>Thomas Edison may have been behind the invention.</li>
                                            <li>Edison worked alongside partners, both financial and commercial, to get
                                                his best inventions off the ground,</li>
                                            <li>Battling challenging cost targets and the need to build.</li>
                                            <li>Partnership with a supplier or original equipment manufacturer.</li>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="Participants">
                                        <ul class="list-unstyled listDefault">
                                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,</li>
                                            <li>tempor incididunt ut labore et dolore magna aliqua.</li>
                                            <li>Partnership with a supplier or original equipment manufacturer.</li>
                                            <li>tempor incididunt ut labore et dolore magna aliqua.</li>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>Thomas Edison may have been behind the invention of the electric light bulb, but he did
                                not work Edison work along side partners, both financial and commercial, to get his
                                inventions.</p>
                            <!-- mapHolder -->
                            <div class="mapHolder">
                                <span class="mapMarker"><img src="images/map-marker.png" alt="marker"></span>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13607.729903367896!2d74.30893281977539!3d31.498539800000007!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1530737870558"
                                    style="border:0" allowfullscreen="" width="100%" height="300"
                                    frameborder="0"></iframe>
                            </div>
                            <div class="bookmarkFoot">
                                <div class="bookmarkCol">
                                    <p><strong class="title font-lato">Tags:</strong> <a href="#">Online</a>, <a
                                            href="#">App Developement</a></p>
                                </div>
                                <div class="bookmarkCol text-right">
                                    <div class="shareWrap">
                                        <strong class="title font-lato">Share:</strong>
                                        <ul class="socail-networks list-unstyled">
                                            <li><a href="#" class="facebook"><span class="fab fa-facebook-f"></span></a>
                                            </li>
                                            <li><a href="#" class="twitter"><span class="fab fa-twitter"></span></a>
                                            </li>
                                            <li><a href="#" class="google"><span
                                                        class="fab fa-google-plus-g"></span></a></li>
                                            <li><a href="#"><span class="fas fa-plus"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- sidebar -->
                        <aside class="col-xs-12 col-md-3" id="sidebar">
                            <!-- widget search -->
                            <section class="widget widget_search">
                                <h3>Search events</h3>
                                <!-- search form -->
                                <form action="#" class="search-form">
                                    <fieldset>
                                        <input placeholder=" Search&hellip;" class="form-control" name="s"
                                            type="search">
                                        <button type="button" class="fas fa-search"><span class="sr-only">search
                                                events</span></button>
                                    </fieldset>
                                </form>
                            </section>
                        </aside>
                    </div>
                </div>
            </main>
            <!-- footer area container -->
            <div class="footer-area bg-dark text-gray">
                <!-- aside -->
                <aside class="aside container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 col">
                            <div class="logo"><a href="home.html"><img src="images/Asset 2@2x-8.png" alt="studyLMS"></a>
                            </div>
                            <p>California Training Institute (CTI) is a digital skills training institute that supports
                                Ethiopians to develop their digital skills through resources, tools, and technology.</p>
                            <a href="#" class="btn btn-default text-uppercase">Start Leaning Now</a>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col hidden-xs">
                            <h3>Popular Courses</h3>
                            <!-- widget cources list -->
                            <ul class="widget-cources-list list-unstyled">
                                <li>
                                    <a href="course-single.html">
                                        <div class="alignleft">
                                            <img src="images/online-shopping-website-2021-08-26-22-39-48-utc.jpg"
                                                alt="image description">
                                        </div>
                                        <div class="description-wrap">
                                            <h4>Introduction to Mobile Apps Development</h4>
                                            <strong
                                                class="price text-primary element-block font-lato text-uppercase">$99.00</strong>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="course-single.html">
                                        <div class="alignleft">
                                            <img src="images/online-shopping-website-2021-08-26-22-39-48-utc.jpg"
                                                alt="image description">
                                        </div>
                                        <div class="description-wrap">
                                            <h4>Become a Professional Film Maker</h4>
                                            <strong
                                                class="price text-success element-block font-lato text-uppercase">Free</strong>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="course-single.html">
                                        <div class="alignleft">
                                            <img src="images/online-shopping-website-2021-08-26-22-39-48-utc.jpg"
                                                alt="image description">
                                        </div>
                                        <div class="description-wrap">
                                            <h4>Swift Programming For Beginners</h4>
                                            <strong
                                                class="price text-primary element-block font-lato text-uppercase">$75.00</strong>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <nav class="col-xs-12 col-sm-6 col-md-3 col">
                            <h3>Quick Links</h3>
                            <!-- fooer navigation -->
                            <ul class="fooer-navigation list-unstyled">
                                <li><a href="#">All Courses</a></li>
                                <li><a href="#">Summer Sessions</a></li>
                                <li><a href="#">Recent Exams</a></li>
                                <li><a href="#">Professional Courses</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">All Courses</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </nav>
                        <div class="col-xs-12 col-sm-6 col-md-3 col">
                            <h3>contact us</h3>
                            <p>If you want to contact us about any issue our support available to help you 8am-7pm
                                Monday to saturday.</p>
                            <!-- ft address -->
                            <address class="ft-address">
                                <dl>
                                    <dt><span class="fas fa-map-marker"><span class="sr-only">marker</span></span></dt>
                                    <dd>Address: Bole Japan Next to Diamond Hotel</dd>
                                    <dt><span class="fas fa-phone-square"><span class="sr-only">phone</span></span></dt>
                                    <dd>Call: <a href="tel:+2156237532">+251 929 737373</a></dd>
                                    <dt><span class="fas fa-envelope-square"><span class="sr-only">email</span></span>
                                    </dt>
                                    <dd>Email: <a href="mailto:info@Studylms.com">info@edu-cti.com;</a></dd>
                                </dl>
                            </address>
                        </div>
                    </div>
                </aside>
                <!-- page footer -->
                <footer id="page-footer" class="font-lato">
                    <div class="container">
                        <div class="row holder">
                            <div class="col-xs-12 col-sm-push-6 col-sm-6">
                                <ul class="socail-networks list-unstyled">
                                    <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-pull-6 col-sm-6">
                                <p><a href="#">CTI</a> | &copy; 2023 <a href="#">Digital Addis</a>, All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- back top of the page -->
            <span id="back-top" class="text-center fa fa-caret-up"></span>
            <!-- loader of the page -->
            <div id="loader" class="loader-holder">
                <div class="block"><img src="images/svg/hearts.svg" width="100" alt="loader"></div>
            </div>
        </div>
        <div class="popup-holder">
            <div id="popup1" class="lightbox-demo">
                <form action="#" class="user-log-form">
                    <h2>Login Form</h2>
                    <div class="form-group">
                        <input type="text" class="form-control element-block" placeholder="Username or email address *">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control element-block" placeholder="Password *">
                    </div>
                    <div class="btns-wrap">
                        <div class="wrap">
                            <label for="rem" class="custom-check-wrap fw-normal font-lato">
                                <input type="checkbox" id="rem" class="customFormReset">
                                <span class="fake-label element-block">Remember me</span>
                            </label>
                            <button type="submit"
                                class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Login</button>
                        </div>
                        <div class="wrap text-right">
                            <p>
                                <a href="#" class="forget-link">Lost your Password?</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div id="popup2" class="lightbox-demo">
                <form action="#" class="user-log-form">
                    <h2>Register Form</h2>
                    <div class="form-group">
                        <input type="email" class="form-control element-block" placeholder="Email address *">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control element-block" placeholder="Password *">
                    </div>
                    <div class="btns-wrap">
                        <div class="wrap">
                            <button type="submit"
                                class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- include jQuery -->
        <script src="js/jquery.js"></script>
        <!-- include jQuery -->
        <script src="js/plugins.js"></script>
        <!-- include jQuery <-->
        </-->
        <script src="js/jquery.main.js"></script>
        <!-- include jQuery -->
        <script type="text/javascript" src="js/init.js"></script>
    </body>

</html>