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
                    <div class="d-col">
                        <!-- instructor-->
                        @if(!empty($user->fullname))
                        <div class="post-author">
                            <div class="alignleft no-shrink rounded-circle">
                                <a href="#"><img src="http://placehold.it/35x35" class="rounded-circle"
                                        alt="image description"></a>
                            </div>
                            <div class="description-wrap">
                                <h2 class="author-heading"><a href="#">Instructor</a></h2>
                                <h3 class="author-heading-subtitle text-uppercase">{{$user->fullname}}
                                </h3>
                            </div>
                        </div>

                        @endif
                    </div>
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


            <div class="aligncenter content-aligncenter">
                <img src="/course_resources/{{$course->course_image}}" style="object-fit:cover; height: 450px"
                    alt="image description">
            </div>
            <h3 class="content-h3">Course Description</h3>
            <p> {{$course->description}} </p>
            <h3 class="content-h3">What you will learn</h3>
            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.
                Iterative approaches to corporate strategy foster collaborative thinking to further the
                overall value proposition. Organically grow the holistic world view of disruptive
                innovation via workplace diversity and empowerment.</p>
            <ul class="listDefault list-unstyled">
                <li>Thomas Edison may have been behind the invention.</li>
                <li>Edison worked alongside partners, both financial and commercial, to get his best
                    inventions off the ground,</li>
                <li>Battling challenging cost targets and the need to build.</li>
            </ul>
            <p>Quasar the only home we've ever known extraordinary claims require extraordinary evidence
                billions billions Drake Eqa tion. Stirred by starlight! At the edge of forever. Rich in
                mystery Sea of Tranquility. Are creatures of the cosmos descend from astronomers.
                Trillion and billions upon billions upon billions upon billions upon billions. upon
                billions upon billions!</p>
            <h2>Carriculam</h2>

            <?php $index = 1; ?>

            @foreach($sections as $section)
            <!-- sectionRow -->
            <section class="sectionRow">
                <h2 class="h6 text-uppercase fw-semi rowHeading">Section {{$index++}}:
                    {{$section->section_name}}
                </h2>
                <!-- sectionRowPanelGroup -->
                <div class="panel-group sectionRowPanelGroup" id="accordion" role="tablist" aria-multiselectable="true">

                    <?php 
                                    $contents = DB::table('contents')->where('section_id', $section->id)->get();
                                    ?>

                    @foreach($contents as $content)
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
                        <!-- collapseOne -->
                        <div id="collapse{{$content->id}}" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p><strong>Description</strong></p>
                                <div class="content_description">
                                    {!! $content->content_description !!}
                                </div>

                                <hr>

                                <p><strong>Resources</strong></p>
                                <?php 
                                                $resources = DB::table('resources')->where('content_id', $content->id)->get();
                                            ?>
                                @foreach($resources as $resource)


                                <span style=" display:inline; width:50%; ">
                                    {{$resource->path}}
                                </span>

                                <span style="display:inline; float:right;">
                                    <a href="/resource/{{$resource->id}}/download" class="m-2"
                                        style="float: right; text-decoration:none;">
                                        <i class="fa fa-download mx-1" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Quiz Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h3 class="panel-title fw-normal">
                                <a class="accOpener" role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseSection{{$section->id}}Quiz" aria-expanded="false"
                                    aria-controls="collapseSection{{$section->id}}Quiz">
                                    <span class="accOpenerCol">
                                        <i class="fas fa-chevron-circle-right accOpenerIcn"></i>
                                        Quiz | Test Exam
                                    </span>
                                </a>
                            </h3>
                        </div>
                        <!-- collapseOne -->
                        <div id="collapseSection{{$section->id}}Quiz" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">

                                <a href="/my_quiz/{{$section->id}}" class="btn btn-warning m-3" style="color:black">
                                    Take Quiz
                                </a>
                                <p></p>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            @endforeach

            <?php 
                                $student_id = Auth::guard('student')->user()->id;
                                $classroom = DB::table('classrooms')->where('course_id', $course->id)->where('student_id', $student_id)->first();
                                
                                $progresses = DB::table('progress')->where('classroom_id', $classroom->id)->where('is_passed', 1)->get();
                            ?>

            @if( $sections->count() > 0 && ($progresses->count() /$sections->count() * 100 ) == 100 )
            <!-- Final Exam Section-->
            <section class="sectionRow">
                <h2 class="h6 text-uppercase fw-semi rowHeading">Final Exam
                </h2>
                <!-- sectionRowPanelGroup -->
                <div class="panel-group sectionRowPanelGroup" id="accordion" role="tablist" aria-multiselectable="true">

                    <!-- Quiz Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h3 class="panel-title fw-normal">
                                <a class="accOpener" role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseSectionFinal" aria-expanded="false"
                                    aria-controls="collapseSectionFinal">
                                    <span class="accOpenerCol">
                                        <i class="fas fa-chevron-circle-right accOpenerIcn"></i>
                                        Final Exam | Take Exam
                                    </span>
                                </a>
                            </h3>
                        </div>
                        <!-- collapseOne -->
                        <div id="collapseSectionFinal" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">

                                <a href="/my_final/{{$course->id}}" class="btn btn-warning m-3" style="color:black">
                                    Take Exam
                                </a>
                                <p></p>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            @endif()

            @if(!empty($user->fullname))
            <h2>About Instructor</h2>
            <!-- instructorInfoBox -->
            <div class="instructorInfoBox">
                <div class="alignleft">
                    <a href="instructor-single.html"><img src="http://placehold.it/80x80" alt="Merry Jhonson"></a>
                </div>
                <div class="description-wrap">
                    <h3 class="fw-normal"><a href="#">{{$user->fullname}}</a></h3>
                    <h4 class="fw-normal">Back-end Developer</h4>
                    <p>Encyclopaedia galactica Orion's sword explorations vanquish the impossible,
                        astonishment radio telescope with pretty stories for which there's little good.
                    </p>
                    <a href="#" class="btn btn-default font-lato fw-semi text-uppercase">View
                        Profile</a>
                </div>
            </div>

            @endif


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
                        <a href="instructor-single.html"><img src="http://placehold.it/50x50" alt="Tim Cook"></a>
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
            <!-- reviesSubmissionForm -->
            <form action="#" class="reviesSubmissionForm">
                <h2 class="text-noCase">Add a Review</h2>
                <p>Your email address will not be published. Required fields are marked <span class="required">*</span>
                </p>
                <div class="form-group">
                    <span class="formLabel fw-normal font-lato no-shrink">Your Rating</span>
                    <ul class="star-rating list-unstyled">
                        <li>
                            <input type="checkbox" id="rate1" class="customFormReset">
                            <label for="rate1" class="fas fa-star"><span class="sr-only">star</span></label>
                        </li>
                        <li>
                            <input type="checkbox" id="rate2" class="customFormReset">
                            <label for="rate2" class="fas fa-star"><span class="sr-only">star</span></label>
                        </li>
                        <li>
                            <input type="checkbox" id="rate3" class="customFormReset">
                            <label for="rate3" class="fas fa-star"><span class="sr-only">star</span></label>
                        </li>
                        <li>
                            <input type="checkbox" id="rate4" class="customFormReset">
                            <label for="rate4" class="fas fa-star"><span class="sr-only">star</span></label>
                        </li>
                        <li>
                            <input type="checkbox" id="rate5" class="customFormReset">
                            <label for="rate5" class="fas fa-star"><span class="sr-only">star</span></label>
                        </li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="rview" class="formLabel fw-normal font-lato no-shrink">Your Review <span
                            class="required">*</span></label>
                    <textarea id="rview" class="form-control element-block"></textarea>
                </div>
                <div class="form-group">
                    <label for="name" class="formLabel fw-normal font-lato no-shrink">Name <span
                            class="required">*</span></label>
                    <input type="text" id="name" class="form-control element-block">
                </div>
                <div class="form-group">
                    <label for="Email" class="formLabel fw-normal font-lato no-shrink">Email <span
                            class="required">*</span></label>
                    <input type="email" id="Email" class="form-control element-block">
                </div>
                <button type="submit" class="btn btn-theme btn-warning text-uppercase font-lato fw-bold">Submit</button>
            </form>
        </article>
        <!-- sidebar -->
        <aside class="col-xs-12 col-md-3" id="sidebar">
            <!-- widget course select -->
            <section class="widget widget_box widget_course_select">
                <header class="widgetHead text-center bg-theme">
                    <h3 class="text-uppercase">Take This Course</h3>
                </header>
                <strong class="price element-block font-lato" data-label="price:">1500.00 ETB</strong>
                <ul class="list-unstyled font-lato">
                    <li><i class="far fa-user icn no-shrink"></i> 199 Students</li>
                    <li><i class="far fa-clock icn no-shrink"></i> Duration: 6 Weeks</li>
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
                    <a href="http://www.youtube.com/embed/9bZkp7q19f0?autoplay=1"
                        class="btn-play far fa-play-circle lightbox fancybox.iframe"></a>
                    <img src="http://placehold.it/260x220" alt="image description">
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