@extends('layouts.studentLayout')

@section('title', 'Setting | CTI')

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
            <li><a href="/my_setting">Setting</a></li>
            <li class="active">Change Password</li>
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

    <br>


    <!-- User Form -->
    <div class="m-3 p-3 ">

        <form action="/student_update_password" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">

            <!--  Old Password -->
            <div class="mb-3 mt-3">
                <label for="old_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="old_password" id="old_password"
                    placeholder="Enter Your Old Password" required>
                @error('old_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!--  New Password -->
            <div class="mb-3 mt-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password"
                    placeholder="Enter Your New Password" required>
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!--  Confirm Password -->
            <div class="mb-3 mt-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                    placeholder="Confirm Password" required>
                @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>

            <!-- Submit Button -->
            <input type="submit" name="submit" class="btn btn-warning">
        </form>
    </div>
    <br>

</div>

@endsection