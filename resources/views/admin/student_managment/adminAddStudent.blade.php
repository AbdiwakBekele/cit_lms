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
        <div class="m-3 mx-5 w-75">

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
                    <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age" min="18"
                        max="60" required>
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
                    <input type="tel" class="form-control" id="phone" placeholder="Enter Phone number" name="phone"
                        pattern="\d{10}" required>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <hr>

                <!-- City -->
                <div class="mb-3 mt-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required>
                    @error('city')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Subcity -->
                <div class="mb-3 mt-3">
                    <label for="subcity" class="form-label">Subcity | Kebele | Wereda</label>
                    <input type="text" class="form-control" id="subcity" placeholder="Enter Subcity" name="subcity"
                        required>
                    @error('subcity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- House No -->
                <div class="mb-3 mt-3">
                    <label for="house_no" class="form-label">House No | Postal Code</label>
                    <input type="text" class="form-control" id="house_no" placeholder="Enter House No" name="house_no"
                        required>
                    @error('house_no')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <hr>

                <!-- Facebook -->
                <div class="mb-3 mt-3">
                    <label for="facebook" class="form-label">Facebook Username (Optional)</label>
                    <input type="text" class="form-control" id="facebook" placeholder="Enter Facbook username"
                        name="facebook">
                    @error('facebook')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Instagram -->
                <div class="mb-3 mt-3">
                    <label for="instagram" class="form-label">Instagram Username (Optional)</label>
                    <input type="text" class="form-control" id="instagram" placeholder="Enter Instagram username"
                        name="instagram">
                    @error('instagram')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- linkedin -->
                <div class="mb-3 mt-3">
                    <label for="linkedin" class="form-label">LinkedIn Username (Optional)</label>
                    <input type="text" class="form-control" id="linkedin" placeholder="Enter linkedin username"
                        name="linkedin">
                    @error('linkedin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- tiktok -->
                <div class="mb-3 mt-3">
                    <label for="tiktok" class="form-label">Tiktok Username (Optional)</label>
                    <input type="text" class="form-control" id="tiktok" placeholder="Enter tiktok username"
                        name="tiktok">
                    @error('tiktok')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- twitter -->
                <div class="mb-3 mt-3">
                    <label for="twitter" class="form-label">Twitter Username (Optional)</label>
                    <input type="text" class="form-control" id="twitter" placeholder="Enter twitter username"
                        name="twitter">
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
                        <option value="high_school">High School</option>
                        <option value="diploma">Diploma</option>
                        <option value="degree">Degree</option>
                        <option value="masters">Masters</option>
                        <option value="phd">PHD</option>
                        <option value="others">Others Courses</option>
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
                        <option value="unemployed">Unemployed</option>
                        <option value="employed">Employed</option>
                        <option value="self_employed">Self-Employed</option>
                        <option value="student">Student</option>
                        <option value="others">Others</option>
                    </select>

                    @error('work_status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Current Occupation -->
                <div class="mb-3 mt-3">
                    <label for="current_occupation" class="form-label">Current Occupation</label>
                    <input type="text" class="form-control" id="current_occupation" placeholder="Enter Status"
                        name="current_occupation" required>
                    @error('current_occupation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Work Experience -->
                <div class="mb-3 mt-3">
                    <label for="work_experience" class="form-label">Work Experience</label>
                    <select name="work_experience" id="work_experience" class="form-control" required>
                        <option value="">Select Your Work Experience</option>
                        <option value="lessthan_1">
                            < 1 year</option>
                        <option value="greaterthan_1">>1 year</option>
                        <option value="1_3years">1 - 3 Years</option>
                        <option value="4_7years">4 - 7 Years</option>
                        <option value="7_10years">7 - 10 Years</option>
                        <option value="greaterthan_10">10+ Years</option>
                    </select>

                    @error('work_experience')
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