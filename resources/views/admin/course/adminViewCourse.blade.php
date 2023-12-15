@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')


<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Course</h3>

            <!-- Breadcrumb - Nav -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/course">Course Management</a></li>
                        <li class="breadcrumb-item active"><a href="#">Course Contents</a></li>
                    </ol>
                </div>
            </nav>
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

            <!-- Displaying Error - Worksheet -->
            @if ($errors->has('course_worksheets.*'))
            @foreach($errors->get('course_worksheets.*') as $error)
            <span class="text-danger">{{ $error[0] }}</span>
            <br>
            @endforeach
            @endif

            <!-- Displaying Error - Resource -->
            @if ($errors->has('course_resource.*'))
            @foreach($errors->get('course_resource.*') as $error)
            <span class="text-danger">{{ $error[0] }}</span>
            <br>
            @endforeach
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

                    <!-- Update Thumbnail -->
                    <a href="#" class="mx-3" style="float: right; text-decoration:none;" data-bs-toggle="modal"
                        data-bs-target="#myModalProfile">
                        <i class="fa fa-edit" aria-hidden="true"></i> Update Course Thumbnail
                    </a>

                    <!-- Modal | Updating Thumbnail -->
                    <div class="modal" id="myModalProfile">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal body -->
                                <div class="modal-body my-4 text-center h5">
                                    Upload New Course Thumbnail

                                    <form action="/course/{{$course->id}}/update_thumbnail" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="file" class="form-control m-3" id="course_thumbnail"
                                            name="course_thumbnail" required>

                                        <input type="submit" class="btn btn-primary" value="Upload">

                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">


                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="m-4">
                <h3 style="color: #16416E;font-size: 35px;font-weight: bold;">
                    Course Chapter</h3>
                <a href="/course/create_section/{{$course->id}}" class="btn btn-warning "> Add New
                    Chapter </a>
            </div>

            @foreach($sections as $index => $section)

            <div class="shadow p-3 m-3">

                <div class="my-4">
                    <span class="text-dark"> <strong> Chapter {{++$index}}:
                            {{$section->section_name}}</strong></span>

                    <!-- Delete Section -->
                    <a href="#" data-bs-toggle="modal" class="mx-3 text-danger"
                        style="float: right; text-decoration:none;" data-bs-target="#myModal{{$section->id}}"><i
                            class="fa fa-trash text-danger mx-1" style="font-size: 17px" aria-hidden="true"></i>Delete
                        Chapter</a>

                    <!-- Edit Section -->
                    <a href="/section/{{$section->id}}/edit" class="mx-3" style="float: right; text-decoration:none;">
                        <i class="fa fa-edit" aria-hidden="true"></i> Edit Chapter </a>

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
                                <p>
                                    <strong>Quiz Questions</strong>

                                    <!-- Add Quiz Section -->
                                    <a href="#" data-bs-toggle="modal" class="mx-3"
                                        style="float: right; text-decoration:none;"
                                        data-bs-target="#quiz{{$content->id}}">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Quiz Questions </a>

                                </p>

                                <!-- Modal | Quiz Type Section -->
                                <div class="modal" id="quiz{{$content->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal body -->
                                            <div class="modal-body my-4 text-center h5">
                                                Select Question Type

                                                <hr>
                                                <a href="/course/create_quiz_multiple/{{$course->id}}/{{$content->id}}"
                                                    class="h6">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Multiple Choice </a>
                                                <hr>

                                                <a href="/course/create_quiz_short/{{$course->id}}/{{$content->id}}"
                                                    class="h6">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Short Answer
                                                </a>

                                                <hr>

                                                <a href="/course/create_quiz_match/{{$course->id}}/{{$content->id}}"
                                                    class="h6">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Matching
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Quiz Section Accordion -->
                                <div id="accordion_quiz">
                                    <div class="card">
                                        <div class="card-header">

                                            <a class="btn" data-bs-toggle="collapse"
                                                href="#collapseQuiz{{$content->id}}">
                                                Quiz | Test Practice ({{$content->quizzes->count()}})
                                                <i class="fa fa-caret-down mx-2" aria-hidden="true"></i>
                                            </a>

                                        </div>
                                        <div id="collapseQuiz{{$content->id}}" class="collapse"
                                            data-bs-parent="#accordion_quiz">
                                            <div class="card-body">

                                                @foreach($content->quizzes as $index => $quiz)

                                                <!-- Edit Quiz -->
                                                <a href="/quiz/{{$quiz->id}}/edit" class="mx-3"
                                                    style="text-decoration:none;">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit</a>

                                                <!-- Delete Quiz -->
                                                <a href="#" data-bs-toggle="modal" class="mx-3 text-danger"
                                                    style="text-decoration:none;"
                                                    data-bs-target="#myModalQuiz{{$quiz->id}}"><i
                                                        class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                                        aria-hidden="true"></i>Delete</a>

                                                <!-- Modal | Deleting Quiz -->
                                                <div class="modal" id="myModalQuiz{{$quiz->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal body -->
                                                            <div class="modal-body my-4 text-center h5">
                                                                Are you sure?
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer p-1">
                                                                <form action="/quiz/{{$quiz->id}}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="submit" class="btn btn-danger"
                                                                        value="Delete">
                                                                </form>
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <strong>{{$index+1}}.</strong> {!! $quiz->question !!}
                                                    <hr>
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p>
                                    <strong>Worksheets</strong>
                                    <!-- Add Worksheets -->

                                    <a href="#" class="mx-3" data-bs-toggle="modal"
                                        data-bs-target="#worksheet{{$content->id}}"
                                        style="float: right; text-decoration:none;">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                        Worksheet </a>
                                </p>

                                <!-- Modal | Add Worksheet -->
                                <div class="modal" id="worksheet{{$content->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal body -->
                                            <div class="modal-body my-4 text-center h5">
                                                Upload Worksheet
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer p-1">
                                                <form action="/course/store_worksheet/{{$content->id}}" method="post"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                                    <input type="file" class="form-control" id="course_worksheet"
                                                        placeholder="Upload course worksheets"
                                                        name="course_worksheets[]" multiple require>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Upload">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </form>
                                                <br>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- List of Worksheets -->
                                @foreach($content->resources->filter(function($resource) {
                                return $resource->type == 1;
                                }) as $worksheet)
                                <div class="row alert alert-secondary">

                                    <div class="col-9">
                                        {{$worksheet->path}}
                                    </div>

                                    <div class="col">
                                        <!-- Download Resource -->
                                        <a href="/resource/{{$worksheet->id}}/download" class="m-2"
                                            style="float: right; text-decoration:none;">
                                            <i class="fa fa-download mx-1" aria-hidden="true"></i>
                                        </a>
                                        <!-- Delete Resource -->
                                        <a href="#" data-bs-toggle="modal" class="m-2"
                                            style="float: right; text-decoration:none;"
                                            data-bs-target="#myModal{{$worksheet->id}}">
                                            <i class="fa fa-trash text-danger mx-1" aria-hidden="true"></i>
                                        </a>

                                        <!-- Modal - Delete Resource -->
                                        <div class="modal" id="myModal{{$worksheet->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal body -->
                                                    <div class="modal-body my-4 text-center h5">
                                                        Are you sure?
                                                        <hr>
                                                        <form action="/resource/{{$worksheet->id}}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <label for="password">Confirm your password
                                                                <span class="text-danger">*</span> </label>
                                                            <input type="password" class="form-control mx-2 my-3"
                                                                name="password" id="password" placeholder="password"
                                                                required>

                                                            <input type="submit" class="btn btn-danger" value="Delete">

                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>

                                                        </form>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                </div>
                                @endforeach

                                <hr>
                                <p>
                                    <strong>Resources</strong>
                                    <!-- Add Resources -->
                                    <a href="#" class="mx-3" data-bs-toggle="modal"
                                        data-bs-target="#resource{{$content->id}}"
                                        style="float: right; text-decoration:none;">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                        Resource </a>
                                </p>

                                <!-- Modal | Add Resource -->
                                <div class="modal" id="resource{{$content->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal body -->
                                            <div class="modal-body my-4 text-center h5">
                                                Upload Resource
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer p-1">
                                                <form action="/course/store_resource/{{$content->id}}" method="post"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                                    <input type="file" class="form-control" id="course_resource"
                                                        placeholder="Upload course worksheets" name="course_resource[]"
                                                        multiple require>
                                                    <br>
                                                    <input type="submit" class="btn btn-primary" value="Upload">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </form>
                                                <br>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- List of Resources -->
                                @foreach($content->resources->filter(function($resource) {
                                return $resource->type == 2;
                                }) as $resource)
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

                                        <!-- Modal - Delete Resource -->
                                        <div class="modal" id="myModal{{$resource->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal body -->
                                                    <div class="modal-body my-4 text-center h5">
                                                        Are you sure?
                                                        <hr>
                                                        <form action="/resource/{{$resource->id}}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <label for="password">Confirm your password
                                                                <span class="text-danger">*</span> </label>
                                                            <input type="password" class="form-control mx-2 my-3"
                                                                name="password" id="password" placeholder="password"
                                                                required>

                                                            <input type="submit" class="btn btn-danger" value="Delete">

                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>

                                                        </form>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                </div>
                                @endforeach
                                <hr>

                                <!-- References -->
                                <p><strong>References</strong></p>
                                <p>
                                    {!! $content->content_reference !!}
                                </p>


                            </div>
                        </div>
                    </div>

                </div>
                @endforeach


            </div>
            @endforeach

        </div>
    </div>
</div>


@endsection