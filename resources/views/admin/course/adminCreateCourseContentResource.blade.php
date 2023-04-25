@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Add New
                Content Resource</h3>
        </div>


        <div class="container">

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

            <form action="/course/store_resource" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="content_id" value="{{$content->id}}">

                <!-- Course Resources -->
                <div class="mb-3 mt-3">
                    <label for="course_resource" class="form-label">Course Resources</label>
                    <input type="file" class="form-control" id="course_resource" placeholder="Upload course resources"
                        name="course_resource[]" multiple require>
                    @error('course_resource')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if ($errors->has('course_resource.*'))
                    @foreach($errors->get('course_resource.*') as $error)
                    <span class="text-danger">{{ $error[0] }}</span>
                    <br>
                    @endforeach
                    @endif
                </div>

                <!-- Submit Button -->
                <input type="submit" name="submit" class="btn btn-warning btn-lg">
            </form>

        </div>

    </div>
</div>

@endsection