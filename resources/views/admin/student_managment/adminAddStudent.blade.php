@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Add New
                Student</h3>
        </div>
        <!-- Student Registration Form -->
        <div class="m-3">

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

            <form action="/student" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">
                <!--  Fullname -->
                <div class="mb-3 mt-3">
                    <label for="fullname" class="form-label">Student Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname"
                        placeholder="Enter Student Fullname" required>
                    @error('fullname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email"
                        required>

                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Age -->
                <div class="mb-3 mt-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age" required>
                    @error('age')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="mb-3 mt-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter Phone number" name="phone">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                    @error('address')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3 mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password"
                        name="password">
                    @error('password')
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