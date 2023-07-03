@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Add New
                Batch</h3>
        </div>
        <div class="m-3">

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

            <form action="/batch" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">
                <!-- Course Fullname -->
                <div class="mb-3 mt-3">
                    <label for="course_id" class="form-label">Course Fullname</label>
                    <select class="form-control" name="course_id" id="course_id" required>
                        <option value=""> Choose... </option>

                        @foreach($courses as $course)
                        <option value="{{$course->id}}"> {{$course->course_name}} </option>
                        @endforeach

                    </select>
                    @error('course_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Batch Name -->
                <div class="mb-3 mt-3">
                    <label for="batch_name" class="form-label">Batch Name</label>
                    <input type="text" class="form-control" name="batch_name" id="batch_name"
                        placeholder="Please provide batch name" required>
                    @error('batch_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Batch Shift -->
                <div class="mb-3 mt-3">
                    <label for="batch_shift" class="form-label">Batch Shift</label>
                    <select class="form-control" name="batch_shift" id="batch_shift" required>
                        <option value=""> Choose... </option>
                        <option value="morning"> Morning </option>
                        <option value="afternoon"> Afternoon </option>
                        <option value="night"> Night </option>
                    </select>
                    @error('batch_shift')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Starting Date -->
                <div class="mb-3 mt-3">
                    <label for="starting_date" class="form-label">Starting Date</label>
                    <input type="date" class="form-control w-50" name="starting_date" id="starting_date" required>
                    @error('starting_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Ending Date -->
                <div class="mb-3 mt-3">
                    <label for="ending_date" class="form-label">Ending Date</label>
                    <input type="date" class="form-control w-50" name="ending_date" id="ending_date" required>
                    @error('ending_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Batch Desciption -->
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Batch Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                        require></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <input type="submit" name="submit" class="btn btn-warning btn-lg">
            </form>
        </div>
    </div>
</div>
@endsection