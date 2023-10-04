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

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
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
            <li><a href="/">My Learning</a></li>
            <li class="active">{{$course->course_name}}</li>
        </ol>
    </div>
</nav>
@if($course->id == 20)
<div style="text-align: center;">
    <img src="{{ asset('images/tele_1.png') }}" width="300px" alt="">

    <img src="{{ asset('images/tele_2.png') }}" width="400px" alt="">

    <img src="{{ asset('images/telebirr.svg') }}" width="250px" alt="">
</div>
@endif
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
            <!-- Checking for Student-Classroom Approval -->
            @if($classroom->is_approved == 1)

            <!-- Course Description -->
            <h3 class="content-h3">Course Description</h3>
            <div id="content_description">
                {!! $course->description !!}
            </div>
            <h2>Curriculum</h2>
            @foreach($sections as $index => $section)
            <!-- sectionRow -->
            <section class="sectionRow">
                <h2 class="h6 text-uppercase fw-semi rowHeading">Chapter {{++$index}}: {{$section->section_name}}</h2>

                <!-- sectionRowPanelGroup -->
                <div class="panel-group sectionRowPanelGroup" id="accordion" role="tablist" aria-multiselectable="true">

                    @foreach($groupedContents[$section->id] as $content)
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
                                    @php
                                    $progress = $classroom->progress->where('content_id', $content->id)->first();
                                    @endphp

                                    @if($progress && $progress->has_taken == 1)
                                    <strong class="text-success"> Score: {{$progress->score}} /
                                        {{$content->quizzes->sum('points')}} </strong>

                                    @endif
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

                                <p>
                                    <strong>Resources</strong>
                                </p>
                                <?php 
                                                $resources = DB::table('resources')->where('content_id', $content->id)->get();
                                            ?>
                                @foreach($resources as $resource)
                                <span style=" display:inline; width:50%; ">
                                    {{$resource->path}}
                                </span>

                                <span style="display:inline; float:right; margin-left: 15px">
                                    <a href="/resource/{{$resource->id}}/downloadStu" class="m-2"
                                        style="float: right; text-decoration:none;">
                                        <i class="fa fa-download mx-1" style="color:black" aria-hidden="true"></i>
                                    </a>
                                </span>

                                <span style="display:inline; float:right;">
                                    <a href="/resource/viewDoc/{{$resource->path}}" class="m-2"
                                        style="float: right; text-decoration:none;">
                                        <i class="fa fa-eye mx-1" style="color:black" aria-hidden="true"></i>
                                    </a>
                                </span>

                                <hr>
                                @endforeach

                                <a href="#" id="" class="btn btn-warning m-3 openModal" style="color:black"> Take Quiz
                                </a>

                                <!-- Modal Quiz Instruction -->
                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <h3>Important Exam Instructions</h3>
                                        <p>Please read the following instructions carefully before starting the exam:
                                        </p>
                                        <ul class="alert alert-danger">
                                            <li>You are not allowed to copy and paste any content during the exam.</li>
                                            <li>Do not attempt to switch tabs or open other browser windows while taking
                                                the exam.</li>
                                            <li>Clicking outside of the exam window may result in automatic submission
                                                of your exam.</li>
                                        </ul>
                                        <p class="text-danger">
                                            <strong> Failure to comply with these instructions may lead to penalties or
                                                disqualification from the exam.</strong>
                                        </p>
                                        <a href="#"
                                            onclick="openNewWindow('/my_quiz/{{$content->id}}/{{$classroom->id}}')"
                                            class="btn btn-warning m-3" style="color:black"> Start Exam </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </section>
            @endforeach

            <!-- If the course is Disabled for the student -->
            @else
            <div class="alert alert-danger"> This Course has been Disabled, Please contact your admin </div>
            @endif
        </article>

        <!-- sidebar -->
        <aside class="col-xs-12 col-md-3" id="sidebar">
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
            <!-- <section class="widget widget_popular_posts">
                <h3>Popular Courses</h3>
                <ul class="widget-cources-list list-unstyled">
                    @foreach($popular_courses as $popular_course)
                    <li>
                        <a href="/course_single/{{$popular_course->id}}">
                            <div class="alignleft large">
                                <img src="/course_resources/{{$popular_course->course_image}}" alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>{{$popular_course->course_name}}</h4>
                                @if($popular_course->id != 20)

                                @if($popular_course->course_price != '0')
                                <strong
                                    class="price text-primary element-block font-lato text-uppercase">{{$popular_course->course_price}}
                                    ETB</strong>
                                @else
                                <strong class="price text-success element-block font-lato text-uppercase">Free</strong>

                                @endif

                                @endif

                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </section> -->

            <!-- Related Courses -->
            <!-- <section class="widget widget_popular_posts">
                <h3>Related Courses</h3>
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
                                @if($related_course->id != 20)

                                @if($related_course->course_price != '0')
                                <strong
                                    class="price text-primary element-block font-lato text-uppercase">{{$related_course->course_price}}
                                    ETB</strong>
                                @else
                                <strong class="price text-success element-block font-lato text-uppercase">Free</strong>
                                @endif

                                @endif

                            </div>
                        </a>
                    </li>
                    @endif

                    @endforeach
                </ul>
            </section> -->


        </aside>
    </div>
</div>

<script>
function openNewWindow(url) {
    var width = screen.width;
    var height = screen.height;

    window.open(url, '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,width=' + width + ',height=' + height);
}

// Modal for Quiz
var modalButtons = document.getElementsByClassName("openModal");
var closeButtons = document.getElementsByClassName("close");
var modals = document.getElementsByClassName("modal");

// Attach event listeners to each modal button
for (var i = 0; i < modalButtons.length; i++) {
    modalButtons[i].addEventListener("click", function() {
        var modal = this.nextElementSibling; // Get the corresponding modal
        modal.style.display = "block";
    });
}

// Attach event listeners to each close button
for (var i = 0; i < closeButtons.length; i++) {
    closeButtons[i].addEventListener("click", function() {
        var modal = this.parentNode.parentNode; // Get the parent modal element
        modal.style.display = "none";
    });
}

// Modal for final
var modalFinal = document.getElementById("myModalFinal");
var btnFinal = document.getElementById("openModalFinal");
var closeBtnFinal = document.getElementById("closeFinal");;

// Modal - Final Clicked
btnFinal.addEventListener("click", function() {
    modalFinal.style.display = "block";
});

closeBtnFinal.addEventListener("click", function() {
    modalFinal.style.display = "none";
});

window.addEventListener("click", function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        modalFinal.style.display = "none";
    }
});
</script>

@endsection