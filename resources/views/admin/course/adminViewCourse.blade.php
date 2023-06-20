@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Course</h3>
        </div>
        <div class="container">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block m-3">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block m-3">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="alert alert-primary">
                <!-- Batch Information -->
                <div class="row">
                    <div class="col-md">
                        <p><strong> Course Name:</strong> {{$course->course_name}}</p>
                    </div>

                    <div class="col-md">
                        <p> <strong>Course short name:</strong> {{$course->short_name}}</p>
                    </div>

                    <div class="col-md">
                        <p> <strong>Course Category:</strong> {{$category->category_name}}</p>
                    </div>

                    <div class="col-md">
                        <p> <strong>Created at:</strong> {{$course->created_at}}</p>
                    </div>
                    <!-- Edit Course -->
                    <a href="/course/{{$course->id}}/edit" class="mx-3" style="float: right; text-decoration:none;">
                        <i class="fa fa-edit" aria-hidden="true"></i> Edit Course </a>

                </div>
            </div>

            <div class="m-4">
                <h3 style="color: #16416E;font-size: 35px;font-weight: bold;">
                    Course Sections</h3>
                <a href="/course/create_section/{{$course->id}}" class="btn btn-warning "> Add New
                    Section </a>
            </div>

            <?php $index = 1; ?>

            @foreach($sections as $section)

            <div class="shadow p-3 m-3">

                <div class="my-4">
                    <span class="text-dark"> <strong> Section {{$index++}}:
                            {{$section->section_name}}</strong></span>

                    <!-- Delete Section -->
                    <a href="#" data-bs-toggle="modal" class="mx-3 text-danger"
                        style="float: right; text-decoration:none;" data-bs-target="#myModal{{$section->id}}"><i
                            class="fa fa-trash text-danger mx-1" style="font-size: 17px" aria-hidden="true"></i>Delete
                        Section</a>

                    <!-- Edit Section -->
                    <a href="/section/{{$section->id}}/edit" class="mx-3" style="float: right; text-decoration:none;">
                        <i class="fa fa-edit" aria-hidden="true"></i> Edit Section </a>

                    <!-- Add Quiz -->
                    <a href="/course/create_quiz/{{$course->id}}/{{$section->id}}" class="mx-3"
                        style="float: right; text-decoration:none;">
                        <i class="fa fa-file-text" aria-hidden="true"></i> Add
                        Quiz Questions </a>

                    <!-- Add Content -->
                    <a href="/course/create_content/{{$section->id}}" class="mx-3"
                        style="float: right; text-decoration:none;">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                        Content </a>
                </div>

                <!-- Modal | Deleting Section -->
                <div class="modal" id="myModal{{$section->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal body -->
                            <div class="modal-body my-4 text-center h5">
                                Are you sure?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer p-1">
                                <form action="/section/{{$section->id}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Section Content -->
                @foreach($section->contents as $content)

                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <!-- Content Title -->
                            <a class="btn" data-bs-toggle="collapse" href="#collapse{{$content->id}}">
                                {{ $content->content_name }}
                                <i class="fa fa-caret-down mx-2" aria-hidden="true"></i>
                            </a>

                            <!-- Edit Content -->
                            <a href="/content/{{$content->id}}/edit" class="mx-3" style="text-decoration:none;">
                                <i class="fa fa-edit" aria-hidden="true"></i> Edit</a>

                            <!-- Delete Content -->
                            <a href="#" data-bs-toggle="modal" class="mx-3 text-danger" style="text-decoration:none;"
                                data-bs-target="#myModalContent{{$content->id}}"><i class="fa fa-trash text-danger mx-1"
                                    style="font-size: 17px" aria-hidden="true"></i>Delete</a>

                            <!-- Modal | Deleting Content -->
                            <div class="modal" id="myModalContent{{$content->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal body -->
                                        <div class="modal-body my-4 text-center h5">
                                            Are you sure?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer p-1">
                                            <form action="/content/{{$content->id}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="collapse{{$content->id}}" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <p><strong>Description</strong></p>
                                <p>
                                    {!! $content->content_description !!}
                                </p>
                                <hr>
                                <p><strong>Resources</strong>
                                    <!-- Add Resources -->
                                    <a href="/course/create_resource/{{$course->id}}/{{$content->id}}" class="mx-3"
                                        style="float: right; text-decoration:none;">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                        Resource </a>
                                </p>

                                <?php 
                                    $resources = DB::table('resources')->where('content_id', $content->id)->get();
                                ?>
                                @foreach($resources as $resource)
                                <div class="row alert alert-secondary">

                                    <div class="col-9">
                                        {{$resource->path}}
                                    </div>

                                    <div class="col">
                                        <!-- Download Resource -->
                                        <a href="/resource/{{$resource->id}}/download" class="m-2"
                                            style="float: right; text-decoration:none;">
                                            <i class="fa fa-download mx-1" aria-hidden="true"></i>
                                        </a>
                                        <!-- Delete Resource -->
                                        <a href="#" data-bs-toggle="modal" class="m-2"
                                            style="float: right; text-decoration:none;"
                                            data-bs-target="#myModal{{$resource->id}}">
                                            <i class="fa fa-trash text-danger mx-1" aria-hidden="true"></i>
                                        </a>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal{{$resource->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal body -->
                                                    <div class="modal-body my-4 text-center h5">
                                                        Are you sure?
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer p-1">
                                                        <form action="/resource/{{$resource->id}}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="submit" class="btn btn-danger" value="Delete">
                                                        </form>
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                </div>
                @endforeach

                <!-- Quiz Section -->
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <?php 
                                $quizzes = DB::table('quizzes')->where('section_id', $section->id)->get();
                            ?>
                            <a class="btn" data-bs-toggle="collapse" href="#collapseQuiz{{$section->id}}">
                                Quiz | Test Practice ({{$quizzes->count()}}) <i class="fa fa-caret-down mx-2"
                                    aria-hidden="true"></i>
                            </a>

                        </div>
                        <div id="collapseQuiz{{$section->id}}" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">

                                @foreach($quizzes as $quiz)

                                <div>
                                    {{$quiz->question}}
                                    <hr>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>



            </div>


            @endforeach







        </div>
    </div>
</div>


@endsection