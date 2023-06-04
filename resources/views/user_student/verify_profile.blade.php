@extends('layouts.studentLayout')

@section('title', 'Profile | CTI')

@section('content')

<!-- heading banner -->
<section class="heading-banner text-white " style="background:#16416E">
    <div class="container holder">
        <div class="align">
        </div>
    </div>
</section>
<!-- breadcrumb nav -->
<nav class="breadcrumb-nav">
    <div class="container">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </div>
</nav>
<!-- two columns -->
<div id="" class="container">
    @if(session()->has('error'))
    <div class="alert alert-danger"> {{ session('error') }} </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success"> {{ session('success') }} </div>
    @endif

    <form action="/student_doc" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="student_id" value="{{$student->id}}">

        <h3> Verify Account </h3>

        <!-- National ID -->
        <div class="mb-3">
            <label for="id_card"> ID (National ID, Password or Driving License)</label>
            <input class="form-control" type="file" name="id_card" id="id_card" required>
            @error('id_card')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Educational Background -->
        <div class="mb-3">
            <label for="edu_docs">Educational Background (including all credential and certificates)</label>
            <input class="form-control" type="file" name="edu_docs" id="edu_docs" required>
            @error('edu_docs')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-warning" type="submit"
            style="color: black; font-size: 18px;font-family: Poppins, sans-serif;">Update Info</button>
        <hr>
    </form>
</div>

@endsection