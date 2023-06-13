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

    <form action="/my_profile_update/{{$student->id}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PUT">
        <h3> Edit your account information</h3>

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

        <!-- City -->
        <div class="mb-3">
            <label for="city">City</label>
            <input class="form-control" type="text" name="city" placeholder="city" id="city" value="{{$student->city}}"
                required>
            @error('city')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Subcity -->
        <div class="mb-3">
            <label for="subcity">Subcity</label>
            <input class="form-control" type="text" name="subcity" placeholder="subcity" id="subcity"
                value="{{$student->subcity}}" required>
            @error('subcity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- House No -->
        <div class="mb-3">
            <label for="house_no">House No</label>
            <input class="form-control" type="text" name="house_no" placeholder="house no" id="house_no"
                value="{{$student->house_no}}" required>
            @error('house_no')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <hr>
        <!-- Facebook -->
        <div class="mb-3 mt-3">
            <label for="facebook" class="form-label">Facebook Username (Optional)</label>
            <input type="text" class="form-control" id="facebook" placeholder="Enter Facbook username"
                value="{{$student->facebook}}" name="facebook">
            @error('facebook')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Instagram -->
        <div class="mb-3 mt-3">
            <label for="instagram" class="form-label">Instagram Username (Optional)</label>
            <input type="text" class="form-control" id="instagram" placeholder="Enter Instagram username"
                value="{{$student->instagram}}" name="instagram">
            @error('instagram')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- linkedin -->
        <div class="mb-3 mt-3">
            <label for="linkedin" class="form-label">LinkedIn Username (Optional)</label>
            <input type="text" class="form-control" id="linkedin" placeholder="Enter linkedin username"
                value="{{$student->linkedin}}" name="linkedin">
            @error('linkedin')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- tiktok -->
        <div class="mb-3 mt-3">
            <label for="tiktok" class="form-label">Tiktok Username (Optional)</label>
            <input type="text" class="form-control" id="tiktok" placeholder="Enter tiktok username"
                value="{{$student->tiktok}}" name="tiktok">
            @error('tiktok')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- twitter -->
        <div class="mb-3 mt-3">
            <label for="twitter" class="form-label">Twitter Username (Optional)</label>
            <input type="text" class="form-control" id="twitter" placeholder="Enter twitter username"
                value="{{$student->twitter}}" name="twitter">
            @error('twitter')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <hr>
        <!-- Educational Level -->
        <div class="mb-3 mt-3">
            <label for="level_of_education" class="form-label">Level of Education</label>
            <select name="level_of_education" id="level_of_education" class="form-control" required>
                <option value="">Select Your Level of Education</option>
                <option value="High School" {{$student->level_of_education == 'High School' ? 'selected' : ''}}>
                    High School</option>
                <option value="Diploma" {{$student->level_of_education == 'Diploma' ? 'selected' : ''}}>Diploma
                </option>
                <option value="Degree" {{$student->level_of_education == 'Degree' ? 'selected' : ''}}>Degree
                </option>
                <option value="Masters" {{$student->level_of_education == 'Masters' ? 'selected' : ''}}>Masters
                </option>
                <option value="PHD" {{$student->level_of_education == 'PHD' ? 'selected' : ''}}>PHD</option>
                <option value="Others" {{$student->level_of_education == 'Others' ? 'selected' : ''}}>Others
                    Courses</option>
            </select>

            @error('level_of_education')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Work Status -->
        <div class="mb-3 mt-3">
            <label for="work_status" class="form-label">Work Status</label>
            <select name="work_status" id="work_status" class="form-control" required>
                <option value="">Select Your Work Status</option>
                <option value="Unemployed" {{$student->work_status == 'Unemployed' ? 'selected' : ''}}>
                    Unemployed</option>
                <option value="Employed" {{$student->work_status == 'Employed' ? 'selected' : ''}}>Employed
                </option>
                <option value="Self-Employed" {{$student->work_status == 'Self-Employed' ? 'selected' : ''}}>
                    Self-Employed</option>
                <option value="Student" {{$student->work_status == 'Student' ? 'selected' : ''}}>Student
                </option>
                <option value="Others" {{$student->work_status == 'Others' ? 'selected' : ''}}>Others</option>
            </select>

            @error('work_status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Current Occupation -->
        <div class="mb-3 mt-3">
            <label for="current_occupation" class="form-label">Current Occupation</label>
            <input type="text" class="form-control" id="current_occupation" placeholder="Enter Status"
                name="current_occupation" value="{{$student->current_occupation}}" required>
            @error('current_occupation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Work Experience -->
        <div class="mb-3 mt-3">
            <label for="work_experience" class="form-label">Work Experience</label>
            <select name="work_experience" id="work_experience" class="form-control" required>
                <option value="">Select Your Work Experience</option>
                <option value="< 1 year" {{$student->work_experience == '< 1 year' ? 'selected' : ''}}>
                    < 1 year</option>
                <option value="1 - 3 Years" {{$student->work_experience == '1 - 3 Years' ? 'selected' : ''}}> 1
                    - 3 Years</option>
                <option value="4 - 7 Years" {{$student->work_experience == '4 - 7 Years' ? 'selected' : ''}}> 4
                    - 7 Years</option>
                <option value="7 - 10 Years" {{$student->work_experience == '7 - 10 Years' ? 'selected' : ''}}>7
                    - 10 Years</option>
                <option value="10+ Years" {{$student->work_experience == '10+ Years' ? 'selected' : ''}}>10+
                    Years</option>
            </select>

            @error('work_experience')
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