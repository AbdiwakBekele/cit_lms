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
                <!-- intro block -->
                <section class="intro-block">
                    <div class="slider fade-slider">
                        <div>
                            <!-- intro block slide -->
                            <article class="intro-block-slide overlay bg-cover"
                                style="background-image: url('images/AM2A0919.JPG');">
                                <div class="align-wrap container">
                                    <div class="align">
                                        <div class="anim">
                                            <h1 class="intro-block-heading">Education &amp; Training Organization</h1>
                                        </div>
                                        <div class="anim delay1">
                                            
                                            <p>We offer the most complete course pakage in the country, for the
                                                research, design and development of Education.</p>
                                        </div>
                                        <div class="anim delay2">
                                            <div class="btns-wrap">
                                                <a href="courses-list.html"
                                                    class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
                                                <a href="contact.html" class="btn btn-white text-uppercase">Contact
                                                    us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <!-- intro block slide -->
                            <article class="intro-block-slide overlay bg-cover"
                                style="background-image: url('images/AM2A0515.JPG');">
                                <div class="align-wrap container">
                                    <div class="align">
                                        <div class="anim">
                                            <h1 class="intro-block-heading">Education Organization</h1>
                                        </div>
                                        <div class="anim delay1">
                                            <p>We offer the most complete course pakage in the country, for the
                                                research, design and development of Education.</p>
                                        </div>
                                        <div class="anim delay2">
                                            <div class="btns-wrap">
                                                <a href="courses-list.html"
                                                    class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
                                                <a href="contact.html" class="btn btn-white text-uppercase">Contact
                                                    us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div>
                            <!-- intro block slide -->
                            <article class="intro-block-slide overlay bg-cover"
                                style="background-image: url('images/AM2A0334.JPG');">
                                <div class="align-wrap container">
                                    <div class="align">
                                        <div class="anim">
                                            <h1 class="intro-block-heading">Training Organization</h1>
                                        </div>
                                        <div class="anim delay1">
                                            <p>We offer the most complete course pakage in the country, for the
                                                research, design and development of Education.</p>
                                        </div>
                                        <div class="anim delay2">
                                            <div class="btns-wrap">
                                                <a href="courses-list.html"
                                                    class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
                                                <a href="contact.html" class="btn btn-white text-uppercase">Contact
                                                    us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="container">
                        <!-- features aside -->
                        <aside class="features-aside">
                            <a href="#" class="col">
                                <span class="icn-wrap text-center no-shrink">
                                    <img src="images/icon01.svg" width="44" height="43" alt="trophy">
                                </span>
                                <div class="description">
                                    <h2 class="features-aside-heading">Best Instructors</h2>
                                    <span class="view-more element-block text-uppercase">view more</span>
                                </div>
                            </a>
                            <a href="#" class="col">
                                <span class="icn-wrap text-center no-shrink">
                                    <img src="images/icon02.svg" width="43" height="39" alt="computer">
                                </span>
                                <div class="description">
                                    <h2 class="features-aside-heading">Learn Courses Onlines</h2>
                                    <span class="view-more element-block text-uppercase">view more</span>
                                </div>
                            </a>
                            <a href="#" class="col">
                                <span class="icn-wrap text-center no-shrink">
                                    <img src="images/icon03.svg" width="43" height="39" alt="computer">
                                </span>
                                <div class="description">
                                    <h2 class="features-aside-heading">Online Library &amp; Store</h2>
                                    <span class="view-more element-block text-uppercase">view more</span>
                                </div>
                            </a>
                        </aside>
                    </div>
                </section>
                <!-- popular posts block -->
                <section class="popular-posts-block container">
                    <header class="popular-posts-head">
                        <h2 class="popular-head-heading">Most Popular Courses</h2>
                    </header>
                    <div class="row">
                        <!-- popular posts slider -->
                        <div class="slider popular-posts-slider">

                            @foreach ($courses as $course)
                            <div class="col-xs-12">
                                <!-- popular post -->
                                <article class="popular-post">
                                    <div class="aligncenter">
                                        <img src='course_resources/{{$course->course_image}}'
                                            style="object-fit: cover; height: 150px" alt="image description">
                                    </div>
                                    <div>
                                        <strong
                                            class="bg-primary text-white font-lato text-uppercase price-tag">$99.00</strong>
                                    </div>
                                    <h3 class="post-heading"><a href="/course_single/{{$course->id}}">
                                            {{$course->course_name}} </a>
                                    </h3>
                                    <div class="post-author">
                                        <div class="alignleft rounded-circle no-shrink">
                                            <a href="instructor-single.html"><img src="images/AM2A1021.JPG"
                                                    class="rounded-circle" alt="image description"></a>
                                        </div>
                                        <h4 class="author-heading"><a href="instructor-single.html">Mr X</a></h4>
                                    </div>
                                    <footer class="post-foot gutter-reset">
                                        <ul class="list-unstyled post-statuses-list">
                                            <li>
                                                <a href="#">
                                                    <span class="fas icn fa-users no-shrink"><span
                                                            class="sr-only">users</span></span>
                                                    <strong class="text fw-normal">98</strong>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="fas icn no-shrink fa-comments"><span
                                                            class="sr-only">comments</span></span>
                                                    <strong class="text fw-normal">10</strong>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="star-rating list-unstyled">
                                            <li><span class="fas fa-star"><span class="sr-only">star</span></span>
                                            </li>
                                            <li><span class="fas fa-star"><span class="sr-only">star</span></span>
                                            </li>
                                            <li><span class="fas fa-star"><span class="sr-only">star</span></span>
                                            </li>
                                            <li><span class="fas fa-star"><span class="sr-only">star</span></span>
                                            </li>
                                            <li><span class="fas fa-star"><span class="sr-only">star</span></span>
                                            </li>
                                        </ul>
                                    </footer>
                                </article>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </section>
                <!-- counter aside -->
                <aside class="bg-cover counter-aside"
                    style="background-image: url('images/learning-2021-08-26-18-11-39-utc.jpg');">
                    <div class="container align-wrap">
                        <div class="align">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col">
                                    <h2 class="counter-aside-heading">
                                        <strong class="countdown element-block">150</strong>
                                        <strong class="text element-block">COUNTRIES REACHED</strong>
                                    </h2>
                                </div>
                                <div class="col-xs-12 col-sm-3 col">
                                    <h2 class="counter-aside-heading">
                                        <strong class="countdown element-block">28000</strong>
                                        <strong class="text element-block">PASSED GRADUATES</strong>
                                    </h2>
                                </div>
                                <div class="col-xs-12 col-sm-3 col">
                                    <h2 class="counter-aside-heading">
                                        <strong class="countdown element-block">750</strong>
                                        <strong class="text element-block">QUALIFIED STAFF</strong>
                                    </h2>
                                </div>
                                <div class="col-xs-12 col-sm-3 col">
                                    <h2 class="counter-aside-heading">
                                        <strong class="countdown element-block">1200</strong>
                                        <strong class="text element-block">COURSES PUBLISHED</strong>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- upcoming events block -->
                <section class="upcoming-events-block container">
                    <header class="block-header">
                        <div class="pull-left">
                            <h2 class="block-header-heading">Upcoming Events</h2>
                            <p>Recent and upcoming educational events listed here</p>
                        </div>
                        <a href="event-list.html" class="btn btn-default text-uppercase pull-right">View More</a>
                    </header>
                    <!-- upcoming events list -->
                    <ul class="list-unstyled upcoming-events-list">
                        <li>
                            <div class="alignright">
                                <img src="images/database_cloud_computing_with_programming_code_on_2022_11_26_00.jpg"
                                    alt="image description">
                            </div>
                            <div class="alignleft">
                                <time datetime="2011-01-12" class="time text-uppercase">
                                    <strong class="date fw-normal">01</strong>
                                    <strong class="month fw-light font-lato">march</strong>
                                    <strong class="day fw-light font-lato">WEDNESDAY</strong>
                                </time>
                            </div>
                            <div class="description-wrap">
                                <h3 class="list-heading"><a href="event-sigle.html">WordPress Theme Development with
                                        Bootstrap</a></h3>
                                <address><time datetime="2011-01-12">8:00 am - 5:00 pm</time> </address>
                                <a href="event-sigle.html" class="btn btn-default text-uppercase">register</a>
                            </div>
                        </li>
                        <li>
                            <div class="alignright">
                                <img src="images/database_cloud_computing_with_programming_code_on_2022_11_26_00.jpg"
                                    alt="image description">
                            </div>
                            <div class="alignleft">
                                <time datetime="2011-01-12" class="time text-uppercase">
                                    <strong class="date fw-normal">05</strong>
                                    <strong class="month fw-light font-lato">march</strong>
                                    <strong class="day fw-light font-lato">SATURDAY</strong>
                                </time>
                            </div>
                            <div class="description-wrap">
                                <h3 class="list-heading"><a href="event-sigle.html">Build Apps with React Native</a>
                                </h3>
                                <address><time datetime="2011-01-12">12:00 pm - 5:00 pm</time> </address>
                                <a href="event-sigle.html" class="btn btn-default text-uppercase">register</a>
                            </div>
                        </li>
                        <li>
                            <div class="alignright">
                                <img src="images/database_cloud_computing_with_programming_code_on_2022_11_26_00.jpg"
                                    alt="image description">
                            </div>
                            <div class="alignleft">
                                <time datetime="2011-01-12" class="time text-uppercase">
                                    <strong class="date fw-normal">13</strong>
                                    <strong class="month fw-light font-lato">march</strong>
                                    <strong class="day fw-light font-lato">Thursday</strong>
                                </time>
                            </div>
                            <div class="description-wrap">
                                <h3 class="list-heading"><a href="event-sigle.html">Advanced Digital Marketing
                                        Course</a></h3>
                                <address><time datetime="2011-01-12">4:00 pm - 8:00 pm</time></address>
                                <a href="event-sigle.html" class="btn btn-default text-uppercase">register</a>
                            </div>
                        </li>
                    </ul>
                </section>
                <!-- course search aside -->
                <aside class="course-search-aside bg-gray">
                    <!-- course search form -->
                    <form action="#" class="container course-search-form">
                        <label class="element-block text-center font-lato">Search For Course</label>
                        <div class="form-holder">
                            <div class="form-row">
                                <div class="form-group">
                                    <select data-placeholder="Category" class="chosen-select-no-single">
                                        <option value="0">Category</option>
                                        <option value="0">Category</option>
                                        <option value="0">Category</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select data-placeholder="Course Cost" class="chosen-select-no-single">
                                        <option value="0">Course Cost</option>
                                        <option value="0">Course Cost</option>
                                        <option value="0">Course Cost</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select data-placeholder="Search Text" class="chosen-select-no-single">
                                        <option value="0">Search Text</option>
                                        <option value="0">Search Text</option>
                                        <option value="0">Search Text</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-theme btn-warning no-shrink text-uppercase">Search</button>
                        </div>
                    </form>
                </aside>
                <!-- categories aside -->
                <aside class="bg-cover categories-aside text-center"
                    style="background-image: url('images/learning-2022-11-09-18-54-07-utc.jpg');">
                    <div class="container holder">
                        <!-- categories list -->
                        <ul class="list-unstyled categories-list">
                            <li>
                                <a href="#">
                                    <div class="align">
                                        <span class="icn-wrap">
                                            <img src="images/icon04.svg" width="43" height="43" alt="image description">
                                        </span>
                                        <strong class="h h5 element-block text-uppercase">Business</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="align">
                                        <span class="icn-wrap">
                                            <img src="images/icon05.svg" width="44" height="48" alt="image description">
                                        </span>
                                        <strong class="h h5 element-block text-uppercase">Language</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="align">
                                        <span class="icn-wrap">
                                            <img src="images/icon06.svg" width="51" height="42" alt="image description">
                                        </span>
                                        <strong class="h h5 element-block text-uppercase">Programming</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="align">
                                        <span class="icn-wrap">
                                            <img src="images/icon07.svg" width="51" height="42" alt="image description">
                                        </span>
                                        <strong class="h h5 element-block text-uppercase">Film &amp; Video</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="align">
                                        <span class="icn-wrap">
                                            <img src="images/icon08.svg" width="51" height="39" alt="image description">
                                        </span>
                                        <strong class="h h5 element-block text-uppercase">Photography</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="align">
                                        <span class="icn-wrap">
                                            <img src="images/icon09.svg" width="51" height="51" alt="image description">
                                        </span>
                                        <strong class="h h5 element-block text-uppercase">Web Design</strong>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
                <!-- getstarted block -->
                <article class="container getstarted-block">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col">
                            <div class="alignleft">
                                <img src="images/local-search-2022-10-26-06-14-25-utc.jpg" alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h2><span class="element-block">Get the coaching training</span><span
                                        class="fw-light ttn element-block">1000s of online courses for free</span></h2>
                                <p>Hurry Up!!;</p>
                                <a href="#" class="btn btn-default text-uppercase">view details</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col text-center">
                            <div class="limit-counter">
                                <strong class="title element-block fw-normal">It’s limited seating! Hurry up</strong>
                                <div id="defaultCountdown" class="comming-timer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- getstarted bar -->
                    <aside class="getstarted-bar bg-gray text-center">
                        <strong class="h h4 element-block">CREATE AN ACCOUNT TO GET STARTED</strong>
                        <a href="#" class="btn btn-theme btn-warning text-uppercase no-shrink">Signin Now</a>
                    </aside>
                </article>
                <!-- testimonials block -->
                <section class="testimonials-block text-center bg-gray"
                    style="background-image: url(images/bg-pattern01.png);">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                <h2>What People Say</h2>
                                <!-- testimonail slider -->
                                <div class="slick-slider slider testimonail-slider">
                                    <div>
                                        <!-- testimonial quote -->
                                        <blockquote class="testimonial-quote font-roboto">
                                            <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a
                                                bludger where he hasn't got a damper. As stands out like brass razoo
                                                heaps it'll be relo. As busy as a paddock.”</p>
                                            <cite class="element-block font-lato">
                                                <span class="avatar rounded-circle element-block">
                                                    <img class="rounded-circle" src="images/AM2A1021.JPG"
                                                        alt="Nethor Doct -Developer">
                                                </span>
                                                <strong class="element-block h5 h">Nethor Doct -<span
                                                        class="text-gray">Developer</span></strong>
                                            </cite>
                                        </blockquote>
                                    </div>
                                    <div>
                                        <!-- testimonial quote -->
                                        <blockquote class="testimonial-quote font-roboto">
                                            <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a
                                                bludger where he hasn't got a damper. As stands out like brass razoo
                                                heaps it'll be relo. As busy as a paddock.”</p>
                                            <cite class="element-block font-lato">
                                                <span class="avatar rounded-circle element-block">
                                                    <img class="rounded-circle" src="images/AM2A1021.JPG"
                                                        alt="Nethor Doct -Developer">
                                                </span>
                                                <strong class="element-block h5 h">Nethor Doct -<span
                                                        class="text-gray">Developer</span></strong>
                                            </cite>
                                        </blockquote>
                                    </div>
                                    <div>
                                        <!-- testimonial quote -->
                                        <blockquote class="testimonial-quote font-roboto">
                                            <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a
                                                bludger where he hasn't got a damper. As stands out like brass razoo
                                                heaps it'll be relo. As busy as a paddock.”</p>
                                            <cite class="element-block font-lato">
                                                <span class="avatar rounded-circle element-block">
                                                    <img class="rounded-circle" src="images/AM2A1021.JPG"
                                                        alt="Nethor Doct -Developer">
                                                </span>
                                                <strong class="element-block h5 h">Nethor Doct -<span
                                                        class="text-gray">Developer</span></strong>
                                            </cite>
                                        </blockquote>
                                    </div>
                                    <div>
                                        testimonial quote
                                        <blockquote class="testimonial-quote font-roboto">
                                            <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a
                                                bludger where he hasn't got a damper. As stands out like brass razoo
                                                heaps it'll be relo. As busy as a paddock.”</p>
                                            <cite class="element-block font-lato">
                                                <span class="avatar rounded-circle element-block">
                                                    <img class="rounded-circle" src="images/AM2A1021.JPG"
                                                        alt="Nethor Doct -Developer">
                                                </span>
                                                <strong class="element-block h5 h">Nethor Doct -<span
                                                        class="text-gray">Developer</span></strong>
                                            </cite>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- news block -->
                <section class="news-block container">
                    <header class="seperator-head text-center">
                        <h2>Recent News</h2>
                        <p>Share your work to collaboratve with our vibrant design element.</p>
                    </header>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <!-- news post -->
                            <article class="news-post">
                                <div class="aligncenter">
                                    <a href="blog-single.html"><img
                                            src="images/digital_tablet_designer_hands_writing_with_pen_fo_2022_12_10_03.jpg"
                                            alt="image desciption"></a>
                                </div>
                                <h3><a href="blog-single.html">Best Educational Psd Template Launching Today</a></h3>
                                <p>Areas tackled in the most fundamental part of medical research include cellu lar and
                                    molecular biology&hellip;</p>
                                <time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017 by <a
                                        href="blog-single.html">andrew caset</a></time>
                            </article>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <!-- news post -->
                            <article class="news-post">
                                <div class="aligncenter">
                                    <a href="blog-single.html"><img
                                            src="images/digital_tablet_designer_hands_writing_with_pen_fo_2022_12_10_03.jpg"
                                            alt="image desciption"></a>
                                </div>
                                <h3><a href="blog-single.html">Your one stop Solution for Android Development Needs</a>
                                </h3>
                                <p>Areas tackled in the most fundamental part of medical research include cellu lar and
                                    molecular biology&hellip;</p>
                                <time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017 by <a
                                        href="blog-single.html">andrew caset</a></time>
                            </article>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <!-- news post -->
                            <article class="news-post">
                                <div class="aligncenter">
                                    <a href="blog-single.html"><img
                                            src="images/digital_tablet_designer_hands_writing_with_pen_fo_2022_12_10_03.jpg"
                                            alt="image desciption"></a>
                                </div>
                                <h3><a href="blog-single.html">Online Learning students council meeting 2017</a></h3>
                                <p>Areas tackled in the most fundamental part of medical research include cellu lar and
                                    molecular biology&hellip;</p>
                                <time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017 by <a
                                        href="blog-single.html">andrew caset</a></time>
                            </article>
                        </div>
                    </div>
                </section>
                <!-- subscription aside block -->
                <aside class="subscription-aside-block bg-theme text-white">
                    <!-- newsletter sub form -->
                    <form action="#" class="container newsletter-sub-form">
                        <div class="row form-holder">
                            <div class="col-xs-12 col-sm-6 col">
                                <div class="text-wrap">
                                    <span class="element-block icn no-shrink rounded-circle"><i
                                            class="far fa-envelope-open"><span class="sr-only">icn</span></i></span>
                                    <div class="inner-wrap">
                                        <label for="email">Signup for Newsletter</label>
                                        <p>Subscribe now and receive weekly newsletter with new updates.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col">
                                <div class="input-group">
                                    <input type="email" id="email" class="form-control"
                                        placeholder="Enter your email&hellip;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-dark text-uppercase" type="button">Submit</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </aside>
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

        <!-- include jQuery -->
        <script src="js/jquery.js"></script>
        <!-- include jQuery -->
        <script src="js/plugins.js"></script>
        <!-- include jQuery -->
        <script src="js/jquery.main.js"></script>
        <!-- include jQuery -->
        <script type="text/javascript" src="js/init.js"></script>
    </body>

</html>