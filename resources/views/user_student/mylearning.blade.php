@extends('layouts.studentLayout')

@section('title', 'My Learning | CTI')


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
            <li class="active">My Learning</li>
        </ol>
    </div>
</nav>
<div style="text-align: center;">
    <img src="{{ asset('images/tele_1.png') }}" width="300px" alt="">

    <img src="{{ asset('images/tele_2.png') }}" width="400px" alt="">

    <img src="{{ asset('images/telebirr.svg') }}" width="250px" alt="">
</div>
<!-- two columns -->
<div id="two-columns" class="container">
    <div class="row">
        <!-- content -->
        <article id="content" class="col-xs-12 col-md-9">
            <!-- show head -->
            <header class="show-head">
                <p> Showing results</p>
                <select class="chosen-select-no-single">
                    <option value="0">All Courses</option>
                    <option value="0">On progress</option>
                    <option value="0">Completed</option>
                    <option value="0">Inactive</option>
                </select>
            </header>
            <div class="row flex-wrap">

                @foreach($classrooms as $classroom)
                <?php 
                    $course = DB::table('courses')->where('id', $classroom->course_id)->first();
                    $sections = DB::table('sections')->where('course_id', $course->id)->get();
                    $batch = DB::table('batches')->where('id', $classroom->batch_id)->first();
                    $progresses = DB::table('progress')->where('classroom_id', $classroom->id)->get();
                    $user = DB::table('users')->where('id', $course->user_id)->first();       
                ?>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <!-- popular post -->
                    <article class="popular-post">
                        <div class="aligncenter">
                            <img src="/course_resources/{{$course->course_image}}" alt="image description"
                                style="object-fit: cover; height: 150px ">
                        </div>
                        <h3 class="post-heading">
                            <a href="/my_course_single/{{$course->id}}/{{$classroom->id}}">{{$course->course_name}}
                                ({{$batch->shift}})</a>
                        </h3>

                        @if(!empty($user->fullname))
                        <div class="post-author">
                            <div class="alignleft rounded-circle no-shrink">
                                <a href="instructor-single.html"><img src="http://placehold.it/35x35"
                                        class="rounded-circle" alt="image description"></a>
                            </div>
                            <h4 class="author-heading"><a href="instructor-single.html">{{$user->fullname}}</a></h4>
                        </div>
                        @endif

                        @if($classroom->is_approved == 0)
                        <p class="text-danger"> Pending </p>
                        @endif

                        <div class="progress "
                            style="margin-top: 3%; margin-bottom: 3%; background-color: #777777; border-radius: 10px;">
                            <div class="progress-bar bg-primary text-white" role="progressbar"
                                style="width: {{ ($sections->count() > 0) ? ($progresses->count() / $sections->count()) * 100 : 0 }}%; border-radius: 10px; height: 20px; font-size: 12px; "
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                                @if ($sections->count() > 0)
                                {{ ($progresses->count() / $sections->count()) * 100 }}%
                                @else
                                0%
                                @endif

                            </div>
                        </div>

                    </article>
                </div>
                @endforeach

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
                    @foreach( $course_categories as $category )
                    <li class="cat-item cat-item-1"><a href="#">{{$category->category_name}}</a></li>
                    @endforeach
                </ul>
            </section>
        </aside>
    </div>
</div>
@endsection