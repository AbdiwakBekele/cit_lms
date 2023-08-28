@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">List of
                Current Batches</h3>
        </div>
        <div class="container">

            <!-- Batch Information -->
            <div class="alert alert-primary">
                <div class="row">

                    <div class="col-md">
                        <p><strong> Batch ID:</strong> BT/{{$classroom->batch->id}}/23</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch Name:</strong> {{$classroom->batch->batch_name}}</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch shift:</strong> {{$classroom->batch->shift}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <p> <strong>Course:</strong> {{$classroom->course->course_name}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>Start date:</strong> {{$classroom->batch->starting_date}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>End date:</strong> {{$classroom->batch->ending_date}}</p>
                    </div>
                </div>
            </div>

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
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Student Status -->
            <h4>Student Status</h4>
            <div class="alert alert-primary m-1 row">

                <div class="col-md">
                    <p><strong> Student ID:</strong> CTI/{{$classroom->student->id}}/23</p>
                </div>

                <div class="col-md">
                    <p><strong> Student Name:</strong> {{$classroom->student->fullname}}</p>
                </div>

                <div class="col-md">
                    <p><strong> Enrolled Date:</strong> {{$classroom->created_at}}</p>
                </div>
            </div>

            <hr>
            <h4> Chapter Progress </h4>

            <div class="alert alert-primary">

                @foreach($classroom->batch->course->sections as $index => $section)

                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <!-- Section Title -->
                            <a class="btn" data-bs-toggle="collapse" href="#collapse{{$section->id}}">
                                Chapter {{++$index}}. {{ $section->section_name }}
                                <i class="fa fa-caret-down mx-2" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div id="collapse{{$section->id}}" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <!-- Section Contents -->
                                @foreach($section->contents as $content_index => $content)
                                <div class="alert alert-light row">
                                    <div class="col">
                                        {{++$content_index}}. {{$content->content_name}}
                                    </div>
                                    @php
                                    $progress = $classroom->progress->where('content_id', $content->id)->first();

                                    @endphp

                                    @if($progress && $progress->has_taken == 1)
                                    <div class="col-2">
                                        <p>Exam Taken</p>
                                    </div>

                                    <div class="col-2">
                                        <p>Score: {{$progress->score}}</p>
                                    </div>

                                    <div class="col-2">
                                        <a href="/review_quiz/{{$classroom->id}}/{{$content->id}}">Review Quiz</a>
                                    </div>
                                    @endif

                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>






        </div>
    </div>
</div>
@endsection