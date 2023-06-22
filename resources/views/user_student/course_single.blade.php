@extends('layouts.studentLayout')

@section('title', 'Course Single | CTI')

@section('style')
<style>
.content_description table {
    border-collapse: collapse;
    margin-bottom: 10px;
}

.content_description th,
td {
    border: 1px solid black;
    padding: 15px;
}

.content_description th {
    background-color: #f2f2f2;
}
</style>

@endsection


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
<!-- two columns -->
<div id="two-columns" class="container">
    <div class="row">
        <!-- content -->
        <article id="content" class="col-xs-12 col-md-9">
            <!-- content h1 -->
            <h1 class="content-h1 fw-semi">{{$course->course_name}}</h1>
            <!-- view header -->
            <header class="view-header row">
                <div class="col-xs-12 col-sm-9 d-flex">
                    <!-- Course Coordinator -->
                    <!-- @if(!empty($course->courseUser->fullname))
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
                    @endif() -->
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
                                    {{$course->courseCategory->category_name}}
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
                <img src="/course_resources/{{$course->course_image}}" style="object-fit:cover; height: 450px"
                    alt="image description">
            </div>
            <h3 class="content-h3">Course Description</h3>
            <div id="content_description">
                {!! $course->description !!}
            </div>

            <h2>Carriculam</h2>

            <?php $index = 1; ?>

            @foreach($course->sections as $section)
            <!-- sectionRow -->
            <section class="sectionRow">
                <h2 class="h6 text-uppercase fw-semi rowHeading">Section {{$index++}}:
                    {{$section->section_name}}
                </h2>
                <!-- sectionRowPanelGroup -->
                <div class="panel-group sectionRowPanelGroup" id="accordion" role="tablist" aria-multiselectable="true">

                    @foreach($section->contents as $content)
                    <!-- panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h3 class="panel-title fw-normal">
                                <a class="accOpener" role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapse{{$content->id}}" aria-expanded="false"
                                    aria-controls="collapse{{$content->id}}">
                                    <span class="accOpenerCol">
                                        <i class="fas fa-chevron-circle-right accOpenerIcn"></i>
                                        {{$content->content_name}}
                                    </span>
                                </a>
                            </h3>
                        </div>
                    </div>
                    @endforeach

                </div>
            </section>
            @endforeach

            <!-- bookmarkFoot -->
            <div class="bookmarkFoot">
                <div class="bookmarkCol text-right">
                    <!-- <a href="/enroll_course/{{$course->id}}"
                        class="btn btn-warning text-dark text-uppercase fw-bold">Enroll
                        this course</a> -->
                </div>
            </div>

            <h2>Reviews</h2>
            <h3 class="h6 fw-semi">There are 2 reviews on this course</h3>
            <!-- reviewsList -->
            <ul class="list-unstyled reviewsList">
                <li>
                    <div class="alignleft">
                        <a href="#"><img src="http://placehold.it/50x50" alt="Lavin Duster"></a>
                    </div>
                    <div class="description-wrap">
                        <div class="descrHead">
                            <h3>Lavin Duster – <time datetime="2011-01-12">March 7, 2016</time></h3>
                            <ul class="star-rating list-unstyled justify-end">
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
                        </div>
                        <p>Brunch fap cardigan, gentrify put a bird on it distillery mumblecore you
                            probably haven't heard of them asymmetrical bushwick. Put a bird on it
                            schlitz fashion.</p>
                    </div>
                </li>
                <li>
                    <div class="alignleft">
                        <a href="#"><img src="http://placehold.it/50x50" alt="Tim Cook"></a>
                    </div>
                    <div class="description-wrap">
                        <div class="descrHead">
                            <h3>Tim Cook – <time datetime="2011-01-12">March 5, 2016</time></h3>
                            <ul class="star-rating list-unstyled justify-end">
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
                        </div>
                        <p>Flxie sartorial cray flexitarian pop-up health goth single-origin coffee
                            sriracha</p>
                    </div>
                </li>
            </ul>

        </article>

        <!-- sidebar -->
        <aside class="col-xs-12 col-md-3" id="sidebar">
            <!-- widget course select -->
            <section class="widget widget_box widget_course_select">
                <header class="widgetHead text-center">
                    <h3 class="text-uppercase">Take This Course</h3>
                </header>
                <strong class="price element-block font-lato" data-label="price:">{{$course->course_price}} ETB</strong>
                <ul class="list-unstyled font-lato">

                    <li><i class="far fa-user icn no-shrink"></i> {{$course->classrooms->count() }} Students</li>
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
                    @foreach($popular_courses as $popular_course)
                    <li>
                        <a href="/course_single/{{$popular_course->id}}">
                            <div class="alignleft large">
                                <img src="/course_resources/{{$popular_course->course_image}}" alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>{{$popular_course->course_name}}</h4>
                                @if($popular_course->course_price != '0')
                                <strong
                                    class="price text-primary element-block font-lato text-uppercase">{{$popular_course->course_price}}
                                    ETB</strong>
                                @else
                                <strong class="price text-success element-block font-lato text-uppercase">Free</strong>

                                @endif

                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </section>

            <!-- Related Courses -->
            <section class="widget widget_popular_posts">
                <h3>Related Courses</h3>
                <!-- widget cources list -->
                <ul class="widget-cources-list list-unstyled">
                    @foreach($course->courseCategory->courses as $related_course)
                    @if($related_course->id !== $course->id)
                    <li>
                        <a href="/course_single/{{$related_course->id}}">
                            <div class="alignleft large">
                                <img src="/course_resources/{{$related_course->course_image}}" alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>{{$related_course->course_name}}</h4>
                                @if($related_course->course_price != '0')
                                <strong
                                    class="price text-primary element-block font-lato text-uppercase">{{$related_course->course_price}}
                                    ETB</strong>
                                @else
                                <strong class="price text-success element-block font-lato text-uppercase">Free</strong>
                                @endif

                            </div>
                        </a>
                    </li>
                    @endif

                    @endforeach
                </ul>
            </section>

        </aside>
    </div>
</div>

@endsection