@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Add Section Quiz Question (Short Answer)</h3>
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

            <form action="/quiz_short" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">

                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="section_id" value="{{$section->id}}">

                <!-- Question -->
                <div class="mb-3 mt-3">
                    <label for="question" class="form-label"> <strong>Question</strong> </label>
                    <textarea class="form-control" name="question" id="question" cols="30" rows="5" required></textarea>
                    @error('question')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <br>
                <input type="submit" name="submit" class="btn btn-warning">
            </form>

            <br>
            <br>


        </div>
    </div>
</div>


@endsection