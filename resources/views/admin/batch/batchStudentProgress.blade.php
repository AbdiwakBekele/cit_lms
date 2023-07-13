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
            <div class="alert alert-primary row">

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

            <h4> Progresses -
                <span class="text-primary">
                    @if($classroom->course->sections->count() > 0)

                    {{ $progresses_passed->count() / $classroom->course->sections->count() * 100  }} %

                    @else

                    {{ 0 }} %

                    @endif
                </span> Completed
            </h4>

            @foreach($classroom->progress as $index => $progress)
            <div class="alert alert-light row m-3">

                <div class="col-md">
                    <p><strong> {{$index + 1}}. </strong> {{ $progress->section->section_name }}</p>
                </div>

                <div class="col-md">
                    <p><strong> Score: </strong> {{$progress->score}}</p>
                </div>

                <div class="col-md">
                    @if($progress->is_passed == '1')
                    <strong class="text-success"> Passed</strong>
                    @else
                    <strong class="text-danger"> Not Passed</strong>
                    @endif
                </div>

                <div class="col-md">
                    <p><strong> Last Update</strong> {{$progress->updated_at}}</p>
                </div>


            </div>

            @endforeach


        </div>
    </div>
</div>
@endsection