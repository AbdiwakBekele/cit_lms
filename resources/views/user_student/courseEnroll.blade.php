@extends('layouts.studentLayout')

@section('title', 'Course Enroll | CTI')

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
            <li><a href="/home">Home</a></li>
            <li><a href="/course_list">Course</a></li>
            <li class="active">{{$course->course_name}}</li>
        </ol>
    </div>
</nav>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif

@error('student_id')
<div class="alert alert-danger alert-block">
    <strong>{{ $message }}</strong>
</div>
@enderror

<!-- two columns -->
<div id="two-columns" class="container">
    <div class="row">
        <!-- Course content -->
        <article id="content" class="col-xs-12 col-md-9">
            <!-- content h1 -->
            <h1 class="content-h1 fw-semi">{{$course->course_name}}</h1>
            <!-- view header -->
            <header class="view-header row">
                <div class="col-xs-12 col-sm-9 d-flex">
                    <!-- Course Coordinator -->
                    @if(!empty($user->fullname))
                    <div class="d-col">
                        <div class="post-author">
                            <div class="alignleft no-shrink rounded-circle">
                                <a href="#"><img src="http://placehold.it/35x35" class="rounded-circle"
                                        alt="image description"></a>
                            </div>
                            <div class="description-wrap">
                                <h2 class="author-heading"><a href="#">Coordinator</a></h2>

                                <h3 class="author-heading-subtitle text-uppercase">{{$user->fullname}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endif()
                    <!-- Course Category -->
                    <div class="d-col">
                        <!-- post author -->
                        <div class="post-author">
                            <div class="alignleft no-shrink icn-wrap">
                                <i class="far fa-bookmark"></i>
                            </div>
                            <div class="description-wrap">
                                <h2 class="author-heading"><a href="#">Category</a></h2>
                                <h3 class="author-heading-subtitle text-uppercase">
                                    {{$course_category->category_name}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="rating-holder">
                        <ul class="star-rating list-unstyled justify-end">
                            <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                            <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                            <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                            <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                            <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                        </ul>
                        <strong class="element-block text-right subtitle fw-normal">(2 Reviews)</strong>
                    </div>
                </div>
            </header>
            <div class="aligncenter content-aligncenter">
                <img src="/course_resources/{{$course->course_image}}" alt="image description">
            </div>



            <!-- Select Batch and Shift -->
            <section class="sectionRow">
                <h2 class="h6 text-uppercase fw-semi rowHeading">Select from available shifts</h2>
                <!-- sectionRowPanelGroup -->
                <div class="panel-group sectionRowPanelGroup" id="accordion2" role="tablist"
                    aria-multiselectable="true">
                    <!-- panels -->
                    @foreach($batches as $batch)

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading2One">
                            <h3 class="panel-title fw-normal">
                                <a class="accOpener" role="button" data-toggle="collapse" data-parent="#accordion2"
                                    href="#collapse{{$batch->id}}" aria-expanded="false"
                                    aria-controls="collapse{{$batch->id}}">
                                    <span class="accOpenerCol">
                                        <i class="fas fa-chevron-circle-right accOpenerIcn"></i>
                                        Starting Date:
                                        {{$batch->starting_date}} <span
                                            class="label label-primary text-white text-uppercase">
                                            <strong> {{$batch->shift}}
                                                Shift</strong></span>
                                    </span>
                                </a>
                            </h3>
                        </div>
                        <!-- collapseOne -->
                        <div id="collapse{{$batch->id}}" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="heading2One">
                            <div class="panel-body">
                                <p>This shift starts on {{$batch->starting_date}} and ends on
                                    {{$batch->ending_date}}
                                </p>

                                <p>
                                    <strong> Description:</strong> {{$batch->description}}
                                </p>

                                <form action="/enroll_now" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="batch_id" value="{{$batch->id}}">
                                    <input type="hidden" name="student_id" value="{{auth('student')->user()->id}}">
                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                    <input type="submit" class="btn btn-warning btn-block mx-5" style="color: black;"
                                        value="Enroll Now">
                                    <br>
                                </form>

                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </section>


        </article>
        <!-- sidebar -->
        <aside class="col-xs-12 col-md-3" id="sidebar">
            <!-- widget course select -->
            <section class="widget widget_box widget_course_select">
                <header class="widgetHead text-center bg-theme">
                    <h3 class="text-uppercase">Take This Course</h3>
                </header>
                <strong class="price element-block font-lato" data-label="price:">{{$course->course_price}}
                    ETB</strong>
                <ul class="list-unstyled font-lato">

                    <li><i class="far fa-user icn no-shrink"></i> {{$course->classrooms->count() }}
                        Students</li>
                    <li><i class="far fa-clock icn no-shrink"></i> Duration:
                        {{$course->course_duration}} Weeks
                    </li>
                    <li><i class="fas fa-bullhorn icn no-shrink"></i> Lectures: 3hr/ Day</li>
                    <li><i class="far fa-address-card icn no-shrink"></i> Certificate of Completion</li>
                </ul>
            </section>

            <!-- widget categories -->
            <section class="widget widget_categories">
                <h3>Course Categories</h3>
                <ul class="list-unstyled text-capitalize font-lato">

                    @foreach($course_categories as $course_category)
                    <li class="cat-item cat-item-1"><a href="#">{{$course_category->category_name}}</a>
                    </li>
                    @endforeach

                </ul>
            </section>
            <!-- widget intro -->
            <section class="widget widget_intro">
                <h3>Course Intro</h3>
                <div class="aligncenter overlay">

                    <a href="{{ asset('course_resources/'.$course->course_intro) }}"
                        class="btn-play far fa-play-circle lightbox fancybox.iframe">
                    </a>
                    <img src="/course_resources/{{$course->course_image}}"
                        style="object-fit:cover; width: 300px; height: 175px" alt="Course">
                </div>
            </section>
            <!-- widget popular posts -->
            <section class="widget widget_popular_posts">
                <h3>Popular Courses</h3>
                <!-- widget cources list -->
                <ul class="widget-cources-list list-unstyled">
                    <li>
                        <a href="course-single.html">
                            <div class="alignleft">
                                <img src="http://placehold.it/60x60" alt="image description">
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
                                <img src="http://placehold.it/60x60" alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>Become a Professional Film Maker</h4>
                                <strong class="price text-success element-block font-lato text-uppercase">Free</strong>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="course-single.html">
                            <div class="alignleft">
                                <img src="http://placehold.it/60x60" alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>Swift Programming For Beginners</h4>
                                <strong
                                    class="price text-primary element-block font-lato text-uppercase">$75.00</strong>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- widget tags -->
            <nav class="widget widget_tags">
                <h3>Tags</h3>
                <!-- tag clouds -->
                <ul class="list-unstyled tag-clouds font-lato">
                    <li><a href="#">Future</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Coding</a></li>
                    <li><a href="#">Education</a></li>
                    <li><a href="#">Technology</a></li>
                </ul>
            </nav>
        </aside>
    </div>
</div>
@endsection