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

    <form action="/my_picture_update/{{$student->id}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">
        <h3> Upload Your Profile Picture</h3>

        <!-- Profile Pic -->
        <div class="mb-3">
            <input class="form-control" type="file" name="profile_img" required>
            @error('profile_img')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <br>
        <button class="btn btn-warning" type="submit"
            style="color: black; font-size: 18px;font-family: Poppins, sans-serif;">Update Info</button>
        <hr>
    </form>
</div>

@endsection