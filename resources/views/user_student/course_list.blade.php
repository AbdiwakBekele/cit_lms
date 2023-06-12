@extends('layouts.studentLayout')

@section('title', 'Course List | CTI')

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
            <li><a href="/">Home</a></li>
            <li class="active">Courses</li>
        </ol>
    </div>
</nav>
<!-- two columns -->
<div id="two-columns" class="container">
    <div class="row">
        <!-- content -->
        <article id="content" class="col-xs-12 col-md-9">
            <!-- show head -->
            <header class="show-head">
                <p> Showing 1–9 of 15 results</p>
                <!-- List of Course Categories -->
                <form>
                    <select class="chosen-select-no-single">
                        <option value="0">All Courses</option>
                        @foreach($course_categories as $course_category)
                        <option value="{{$course_category->id}}">{{$course_category->category_name}}
                        </option>
                        @endforeach
                    </select>
                </form>

            </header>

            <!-- List of Courses -->
            <div class="row flex-wrap">

                @foreach($courses as $course)
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <!-- popular post -->
                    <article class="popular-post">
                        <div class="aligncenter">
                            <img src="course_resources/{{$course->course_image}}" alt="{{$course->course_name}}"
                                style="object-fit: cover; height: 150px">
                        </div>
                        <div>
                            <strong
                                class="bg-primary text-white font-lato text-uppercase price-tag">{{$course->courseCategory->category_name}}</strong>
                        </div>
                        <h3 class="post-heading"><a href="/course_single/{{$course->id}}">{{$course->course_name}}</a>
                        </h3>

                        @if(!empty($course->courseUser->fullname))
                        <div class="post-author">
                            <div class="alignleft rounded-circle no-shrink">
                                <a href="instructor-single.html"><img src="http://placehold.it/35x35"
                                        class="rounded-circle" alt="image description"></a>
                            </div>
                            <h4 class="author-heading">
                                <a href="#">{{$course->courseUser->fullname}}</a>
                            </h4>
                        </div>
                        @endif
                        <footer class="post-foot gutter-reset">
                            <ul class="list-unstyled post-statuses-list">
                                <li>
                                    <a href="#">
                                        <span class="fas icn fa-users no-shrink"><span
                                                class="sr-only">users</span></span>
                                        <strong class="text fw-normal">{{$course->classrooms->count()}}</strong>
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
            <nav aria-label="Page navigation">
                <!-- pagination -->
                <ul class="pagination">
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&rsaquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </article>
        <!-- sidebar -->
        <aside class="col-xs-12 col-md-3" id="sidebar">
            <!-- widget search -->
            <section class="widget widget_search">
                <h3>Course Search</h3>
                <!-- search form -->
                <form action="#" class="search-form">
                    <fieldset>
                        <input placeholder=" Search&hellip;" class="form-control" name="s" type="search">
                        <button type="button" class="fas fa-search"><span class="sr-only">search</span></button>
                    </fieldset>
                </form>
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
        </aside>
    </div>
</div>

@endsection