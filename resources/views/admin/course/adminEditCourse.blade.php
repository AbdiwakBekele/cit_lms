@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Edit
                Course Detail</h3>
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
            <form action="/course/{{$course->id}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <!-- Course Fullname -->
                <div class="mb-3 mt-3">
                    <label for="course_name" class="form-label">Course Fullname</label>
                    <input type="text" class="form-control" id="course_name" placeholder="Enter Course Fullname"
                        name="course_name" value="{{$course->course_name}}">
                    @error('course_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Course shortname -->
                <div class="mb-3 mt-3">
                    <label for="short_name" class="form-label">Course Short name</label>
                    <input type="text" class="form-control" id="short_name" placeholder="Enter Course Fullname"
                        name="short_name" value="{{$course->short_name}}">
                    @error('short_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Category -->
                <div class="mb-3 mt-3">
                    <label for="course_category" class="form-label">Course Category</label>
                    <select class="form-control" name="course_category" id="course_category">
                        <option value=""> Choose... </option>
                        <?php 
                                        foreach($categories as $category){
                                            $selected = ($category->id == $course->course_category_id) ? "selected" : "";
                                        echo "<option value='".$category->id."'". $selected."  >".$category->category_name."</option>";
                                        }   
                                    ?>
                    </select>

                    @error('course_category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Assigned Teacher Coordinator -->
                <div class="mb-3 mt-3">
                    <label for="assigned_coordinator" class="form-label">Assigned Coordinator</label>
                    <select class="form-control" name="assigned_coordinator" id="assigned_coordinator">
                        <option value=""> Choose... </option>
                        <?php 
                                        foreach($coordinators as $coordinator){
                                        $selected = ($coordinator->id == $course->user_id) ? "selected" : "";
                                        echo "<option value='".$coordinator->id."'".$selected .">".$coordinator->fullname."</option>";
                                        }
                                    ?>
                    </select>
                    @error('assigned_coordinator')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Desciption -->
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Course Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30"
                        rows="15">{{$course->description}} </textarea>
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