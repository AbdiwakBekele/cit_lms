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

    <form action="#" method="post" class="user">
        {{ csrf_field() }}

        <h3> Edit your account information</h3>

        <!-- Profile Picture -->
        <div class="mb-3">
            <label for="profile_img"> Profile Picture</label>
            <input class="form-control" type="file" name="profile_img" id="profile_img"
                value="{{$student->profile_img}}" required>
            @error('age')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Fullname -->
        <div class="mb-3">
            <label for="fullname"> Full name</label>
            <input class="form-control" type="text" name="fullname" placeholder="Student Full Name"
                value="{{$student->fullname}}" required>
            @error('fullname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">

            <label for="email"> Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" id="email"
                value="{{$student->email}}" required>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Gender -->
        <div class="mb-3">

            <label for="gender"> Gender</label>
            <select name="gender" id="gender" class="form-select" required>

                <option value="">Choose Gender</option>
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $student->gender == 'male' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Age -->
        <div class="mb-3">
            <label for="age">Age</label>
            <input class="form-control" type="number" name="age" placeholder="Age" id="age" value="{{$student->age}}"
                required>
            @error('age')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label for="phone">Phone No</label>
            <input class="form-control" type="tel" name="phone" placeholder="Phone Number" id="phone"
                value="{{$student->phone}}" required>
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="address">Address</label>
            <input class="form-control" type="address" name="address" placeholder="Address" id="address"
                value="{{$student->address}}" required>
            @error('address')
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