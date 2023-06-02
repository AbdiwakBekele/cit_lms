@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Edit Course Section | {{$section->course->course_name}}</h3>
        </div>
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
        <div class="container">

            <form action="/section/{{$section->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <!-- Section Name -->
                <div class="mb-3 mt-3">
                    <label for="section_name" class="form-label">Section Title</label>
                    <input type="text" class="form-control" id="section_name" placeholder="Enter Section Title"
                        name="section_name" value="{{$section->section_name}}" required>
                    @error('section_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Section Date -->
                <div class="mb-3 mt-3">
                    <label for="duration" class="form-label">Section Duration (Days)</label>
                    <input type="number" class="form-control" id="duration" placeholder="Enter Section Duration"
                        name="duration" value="{{$section->duration}}" required>
                    @error('duration')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Section Desciption -->
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Section Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="15" require>
                    {{$section->section_description}} </textarea>
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