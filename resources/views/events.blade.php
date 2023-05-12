@extends('layouts.studentLayout')

@section('title', 'Events | CTI')

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
            <li><a href="course-single.html">Home</a></li>
            <li class="active">Events</li>
        </ol>
    </div>
</nav>
<!-- upcoming events block -->
<section class="upcoming-events-block container">
    <!-- upcoming events list -->
    <ul class="list-unstyled upcoming-events-list">
        <li>
            <div class="alignright">
                <img src="http://placehold.it/220x130" alt="image description">
            </div>
            <div class="alignleft">
                <time datetime="2011-01-12" class="time text-uppercase">
                    <strong class="date fw-normal">01</strong>
                    <strong class="month fw-light font-lato">march</strong>
                    <strong class="day fw-light font-lato">WEDNESDAY</strong>
                </time>
            </div>
            <div class="description-wrap">
                <h3 class="list-heading"><a href="/event_single">WordPress Theme Development with
                        Bootstrap</a></h3>
                <address><time datetime="2011-01-12">8:00 am - 5:00 pm</time> | Lab 2</address>
                <a href="/event_single" class="btn btn-default text-uppercase">register</a>
            </div>
        </li>
        <li>
            <div class="alignright">
                <img src="http://placehold.it/220x130" alt="image description">
            </div>
            <div class="alignleft">
                <time datetime="2011-01-12" class="time text-uppercase">
                    <strong class="date fw-normal">05</strong>
                    <strong class="month fw-light font-lato">march</strong>
                    <strong class="day fw-light font-lato">SATURDAY</strong>
                </time>
            </div>
            <div class="description-wrap">
                <h3 class="list-heading"><a href="/event_single">Build Apps with React Native</a>
                </h3>
                <address><time datetime="2011-01-12">12:00 pm - 5:00 pm</time> | Lab 1</address>
                <a href="/event_single" class="btn btn-default text-uppercase">register</a>
            </div>
        </li>
        <li>
            <div class="alignright">
                <img src="http://placehold.it/220x130" alt="image description">
            </div>
            <div class="alignleft">
                <time datetime="2011-01-12" class="time text-uppercase">
                    <strong class="date fw-normal">13</strong>
                    <strong class="month fw-light font-lato">march</strong>
                    <strong class="day fw-light font-lato">Thursday</strong>
                </time>
            </div>
            <div class="description-wrap">
                <h3 class="list-heading"><a href="/event_single">Basic Digital Skills Class</a></h3>
                <address><time datetime="2011-01-12">4:00 pm - 8:00 pm</time> |Lab 3</address>
                <a href="/event_single" class="btn btn-default text-uppercase">register</a>
            </div>
        </li>
        <li>
            <div class="alignright">
                <img src="http://placehold.it/220x130" alt="image description">
            </div>
            <div class="alignleft">
                <time datetime="2011-01-12" class="time text-uppercase">
                    <strong class="date fw-normal">18</strong>
                    <strong class="month fw-light font-lato">march</strong>
                    <strong class="day fw-light font-lato">saturday</strong>
                </time>
            </div>
            <div class="description-wrap">
                <h3 class="list-heading"><a href="/event_single">Advanced Digital Marketing Class
                    </a></h3>
                <address><time datetime="2011-01-12">8:00 am - 5:00 pm</time> |Lab 2</address>
                <a href="/event_single" class="btn btn-default text-uppercase">register</a>
            </div>
        </li>
        <li>
            <div class="alignright">
                <img src="http://placehold.it/224x149" alt="image description">
            </div>
            <div class="alignleft">
                <time datetime="2011-01-12" class="time text-uppercase">
                    <strong class="date fw-normal">22</strong>
                    <strong class="month fw-light font-lato">march</strong>
                    <strong class="day fw-light font-lato">wednesday</strong>
                </time>
            </div>
            <div class="description-wrap">
                <h3 class="list-heading"><a href="/event_single">Learn Networking Webinar</a></h3>
                <address><time datetime="2011-01-12">12:00 pm - 5:00 pm</time> | Lab 1</address>
                <a href="/event_single" class="btn btn-default text-uppercase">register</a>
            </div>
        </li>
    </ul>
    <nav aria-label="Page navigation">
        <!-- pagination -->
        <ul class="pagination">
            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
            <li><a href="#">2</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">›</span>
                </a>
            </li>
        </ul>
    </nav>
</section>
@endsection