@extends('layouts.studentLayout')

@section('title', 'About | CTI')

@section('content')


<!-- heading banner -->
<section class="heading-banner text-white " style="background:#16416E">
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
            <li class="active">About us</li>
        </ol>
    </div>
</nav>

<!-- text info block -->
<article class="container text-info-block">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <h1>Before we get ahead of ourselves, we want to welcome you to here.</h1>
            <p>California Training Institute (CTI) is a digital skills training institute that supports
                Ethiopians to develop their digital skills through resources, tools, and technology.
                Drawing from over 15 years of international experience and gaining credentials from
                Meta, Google, The American Marketing Association (AMA), and other international
                institutions, coupled with its local expertise from Digital Addis, and its multi sector
                clients, CTI provides a distinctive perspective that enables students to gain an
                international understanding of the digital landscape as well as the tools and skills to
                adopt it into the Ethiopian context. </p>
            <ul class="list-unstyled listDefault">
                <li>Our mission is simple: to equip our students with the skills and knowledge they need
                    to thrive in the digital age and to become leaders in their respective fields. We
                    strive to provide an inclusive learning environment that fosters collaboration and
                    creativity, as well as an understanding of the local and global digital landscape.
                </li>
                <li>Our Vision To empower Ethiopians to thrive in the digital age by providing
                    world-class digital skills training and education, enabling them to become
                    competitive in both the local and global economy.</li>

            </ul>
        </div>
        <div class="col-xs-12 col-sm-6">
            <img src="{{ asset('images/AM2A0919.JPG') }} " class="element-block image" alt="image description">
        </div>
    </div>
</article>

<!-- counter aside -->
<aside class="bg-cover counter-aside bg-primary">
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

<!-- why lms block -->
<article class="why-lms-block container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col">
            <h2 class="sep-heading text-capitalize">Happy Students Say</h2>
            <!-- why say slider -->
            <div class="slider why-say-slider">
                <div>
                    <!-- say quote -->
                    <blockquote class="say-quote">
                        <q class="element-block">&ldquo; I have used various platforms to manage
                            academic and online courses, and this is one of the best out there. I find
                            that it is a great alternative to others that may be more costly for
                            institutions. &rdquo;</q>
                        <cite>
                            <span class="alignleft rounded-circle no-shrink">
                                <img class="rounded-circle" src="http://placehold.it/67x67"
                                    alt="Gregory Benford Developer">
                            </span>
                            <span class="description-wrap">
                                <strong class="element-block author-title text-capitalize font-roboto fw-normal">Mr
                                    X</strong>
                                <strong
                                    class="element-block author-subtitle font-lato fw-normal text-capitalize">Student</strong>
                            </span>
                        </cite>
                    </blockquote>
                </div>

                <div>
                    <!-- say quote -->
                    <blockquote class="say-quote">
                        <q class="element-block">&ldquo; I have used various platforms to manage
                            academic and online courses, and this is one of the best out there. I find
                            that it is a great alternative to others that may be more costly for
                            institutions. &rdquo;</q>
                        <cite>
                            <span class="alignleft rounded-circle no-shrink">
                                <img class="rounded-circle" src="http://placehold.it/67x67"
                                    alt="Gregory Benford Developer">
                            </span>
                            <span class="description-wrap">
                                <strong class="element-block author-title text-capitalize font-roboto fw-normal">Mr
                                    X</strong>
                                <strong
                                    class="element-block author-subtitle font-lato fw-normal text-capitalize">Student</strong>
                            </span>
                        </cite>
                    </blockquote>
                </div>
                <div>
                    <!-- say quote -->
                    <blockquote class="say-quote">
                        <q class="element-block">&ldquo;I have used various platforms to manage academic
                            and online courses, and this is one of the best out there. I find that it is
                            a great alternative to others that may be more costly for institutions.
                            &rdquo;</q>
                        <cite>
                            <span class="alignleft rounded-circle no-shrink">
                                <img class="rounded-circle" src="http://placehold.it/67x67"
                                    alt="Gregory Benford Developer">
                            </span>
                            <span class="description-wrap">
                                <strong class="element-block author-title text-capitalize font-roboto fw-normal">Mr
                                    X</strong>
                                <strong
                                    class="element-block author-subtitle font-lato fw-normal text-capitalize">Student</strong>
                            </span>
                        </cite>
                    </blockquote>
                </div>
                <div>
                    <!-- say quote -->
                    <blockquote class="say-quote">
                        <q class="element-block">&ldquo;I have used various platforms to manage academic
                            and online courses, and this is one of the best out there. I find that it is
                            a great alternative to others that may be more costly for institutions.
                            &rdquo;</q>
                        <cite>
                            <span class="alignleft rounded-circle no-shrink">
                                <img class="rounded-circle" src="http://placehold.it/67x67"
                                    alt="Gregory Benford Developer">
                            </span>
                            <span class="description-wrap">
                                <strong class="element-block author-title text-capitalize font-roboto fw-normal">Mr
                                    X</strong>
                                <strong
                                    class="element-block author-subtitle font-lato fw-normal text-capitalize">Student</strong>
                            </span>
                        </cite>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col">
            <h2 class="sep-heading">Why Studylms Best?</h2>
            <!-- why panel group accrdion -->
            <div class="panel-group why-panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <!-- panel -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title fw-normal">
                            <a class="accOpener element-block" role="button" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">Learn anything online</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <p>The Advanced Digital Marketing Course will give you everything you need
                                to succeed in the corporate world of marketing and advertising. On
                                completion of this course, you will be able to develop and execute a
                                solid digital marketing strategy.</p>
                        </div>
                    </div>
                </div>
                <!-- panel -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title fw-normal">
                            <a class="accOpener element-block" role="button" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseTwo" aria-expanded="true"
                                aria-controls="collapseTwo">Basic to advance course</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel"
                        aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <p>The Advanced Digital Marketing Course will give you everything you need
                                to succeed in the corporate world of marketing and advertising. On
                                completion of this course, you will be able to develop and execute a
                                solid digital marketing strategy.</p>
                        </div>
                    </div>
                </div>
                <!-- panel -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title fw-normal">
                            <a class="accOpener element-block" role="button" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">Learn anything online</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                        aria-labelledby="headingThree">
                        <div class="panel-body">
                            <p>The Advanced Digital Marketing Course will give you everything you need
                                to succeed in the corporate world of marketing and advertising. On
                                completion of this course, you will be able to develop and execute a
                                solid digital marketing strategy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>


<!-- aside note block -->
<aside class="bg-theme aside-note-block text-white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col">
                <span class="icn-wrap alignleft element-block">
                    <img src=" {{ asset('images/icon10.png') }} " alt="image description">
                </span>
                <div class="descr-wrap">
                    <h3>New Student Join Every Week</h3>
                    <p><strong class="fw-semi">New courses, interesting posts, popular books and much
                            more!</strong></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col text-right">
                <a href="#" class="btn btn-white btn-default text-capitalize font-lato fw-normal">Apply
                    Course Now</a>
            </div>
        </div>
    </div>
</aside>

@endsection