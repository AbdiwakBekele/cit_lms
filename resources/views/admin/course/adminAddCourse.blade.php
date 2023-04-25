@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')



<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Add New
                Courses</h3>
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

            <form action="/course" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">
                <!-- Course Fullname -->
                <div class="mb-3 mt-3">
                    <label for="course_name" class="form-label">Course Fullname</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="course_name" placeholder="Enter Course Fullname"
                        name="course_name">
                    @error('course_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course shortname -->
                <div class="mb-3 mt-3">
                    <label for="short_name" class="form-label">Course Short name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="short_name" placeholder="Enter Course Fullname"
                        name="short_name">
                    @error('short_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Category -->
                <div class="mb-3 mt-3">
                    <label for="course_category" class="form-label">Course Category</label>
                    <span class="text-danger">*</span>
                    <select class="form-control" name="course_category" id="course_category">
                        <option value=""> Choose... </option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach

                    </select>
                    @error('course_category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Image -->
                <div class="mb-3 mt-3">
                    <label for="course_image" class="form-label">Course Image</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="course_image" placeholder="Enter Course Image"
                        name="course_image" required>
                    @error('course_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Intro Video -->
                <div class="mb-3 mt-3">
                    <label for="course_intro" class="form-label">Course Intro Video</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="course_intro" placeholder="Enter Course Intro Video"
                        name="course_intro" required>
                    @error('course_intro')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Duration -->
                <div class="mb-3 mt-3">
                    <label for="course_duration" class="form-label">Course Duration(Weeks)</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="course_duration"
                        placeholder="Enter course duration in weeks" min="0" name="course_duration" required>
                    @error('course_duration')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Price -->
                <div class="mb-3 mt-3">
                    <label for="course_price" class="form-label">Course Price (ETB)</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="course_price" placeholder="Enter course price in ETB"
                        min="0" name="course_price" value="0" required>
                    @error('course_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Assigned Teacher Coordinator -->
                <div class="mb-3 mt-3">
                    <label for="assigned_coordinator" class="form-label">Assigned Coordinator
                        (Optional)</label>

                    <select class="form-control" name="assigned_coordinator" id="assigned_coordinator">
                        <option value=""> Choose... </option>
                        @foreach($coordinators as $coordinator)
                        <option value="{{$coordinator->id}}">{{$coordinator->fullname}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Course Desciption -->
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Course Description</label>
                    <span class="text-danger">*</span>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="15"
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