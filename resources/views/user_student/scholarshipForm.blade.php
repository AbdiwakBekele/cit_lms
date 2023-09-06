@extends('layouts.studentLayout')

@section('title', 'Scholarship - CTI')

@section('content')
<style>
    /* Form container */
    .form-container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
    }

    /* Form title */
    .form-title {
        color: #16416E;
        font-size: 35px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Form input fields */
    .form-input {
        margin-bottom: 15px;
    }

    /* Form submit button */
    .form-submit {
        background-color: #FFC107;
        color: #fff;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-submit:hover {
        background-color: #FFA000;
    }

    /* Error message */
    .error-message {
        color: red;
        font-size: 14px;
    }
</style>

<div class="form-container">
    <h3 class="form-title">Apply for Scholarship</h3>

    <!-- Student Registration Form -->
    <form action="/scholarship" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="_method" value="POST">

        <!-- Personal Information -->
        <div class="form-input">
            <label for="fullname">Student Fullname</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Student Fullname" required>
            @error('fullname')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-input">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email" required>
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date of Birth -->
        <div class="form-input">
            <label for="age">Date of Birth</label>
            <input type="date" class="form-control" id="age" name="age" required>
            @error('age')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Gender -->
        <div class="form-input">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone Number -->
        <div class="form-input">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" id="phone" placeholder="Enter Phone number" name="phone" pattern="\d{10}" required>
            @error('phone')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Address -->
        <div class="form-input">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required>
            @error('city')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-input">
            <label for="subcity">Subcity | Kebele | Wereda</label>
            <input type="text" class="form-control" id="subcity" placeholder="Enter Subcity" name="subcity" required>
            @error('subcity')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Level of Education -->
        <div class="form-input">
            <label for="level_of_education">Level of Education</label>
            <select name="level_of_education" id="level_of_education" class="form-control" required>
                <option value="">Select Your Level of Education</option>
                <option value="High School">High School</option>
                <option value="Diploma">Diploma</option>
                <option value="Degree">Degree</option>
                <option value="Masters">Masters</option>
                <option value="PHD">PHD</option>
                <option value="Others">Others Courses</option>
            </select>
            @error('level_of_education')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Work Status -->
        <div class="form-input">
            <label for="work_status">Work Status</label>
            <select name="work_status" id="work_status" class="form-control" required>
                <option value="">Select Your Work Status</option>
                <option value="None">None</option>
                <option value="Unemployed">Unemployed</option>
                <option value="Employed">Employed</option>
                <option value="Self-Employed">Self-Employed</option>
                <option value="Student">Student</option>
                <option value="Others">Others</option>
            </select>
            @error('work_status')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Current Occupation -->
        <div class="form-input">
            <label for="current_occupation">Current Occupation</label>
            <input type="text" class="form-control" id="current_occupation" placeholder="Enter Status" name="current_occupation" required>
            @error('current_occupation')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Work Experience -->
        <div class="form-input">
            <label for="work_experience">Work Experience</label>
            <select name="work_experience" id="work_experience" class="form-control" required>
                <option value="">Select Your Work Experience</option>
                <option value="None">None</option>
                <option value="< 1 year">< 1 year</option>
                <option value="1 - 3 Years">1 - 3 Years</option>
                <option value="4 - 7 Years">4 - 7 Years</option>
                <option value="7 - 10 Years">7 - 10 Years</option>
                <option value="10+ Years">10+ Years</option>
            </select>
            @error('work_experience')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Course Enrollment -->
        <div class="form-input">
            <label for="course">Select Course</label>
            <select name="course_id" id="course" class="form-control" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->course_name}} | {{$course->course_price}} ETB</option>
                @endforeach
            </select>
            @error('course_id')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Additional Info -->
        <div class="form-input">
            <label for="additional_info">Please provide additional information</label>
            <textarea class="form-control" id="additional_info" name="additional_info" rows="4"></textarea>
        </div>
        @error('additional_info')
        <span class="error-message">{{ $message }}</span>
        @enderror

        <!-- Submit Button -->
        <input type="submit" name="submit" class="form-submit" value="Submit">
    </form>
</div>


<script>
//Setting min date of birth
const dobInput = document.getElementById("age");

// Calculate the minimum and maximum date values based on the current date
const currentDate = new Date();
const minDate = new Date(currentDate);
minDate.setFullYear(currentDate.getFullYear() - 60);

const maxDate = new Date(currentDate);
maxDate.setFullYear(currentDate.getFullYear() - 18);

// Format the minimum and maximum date values in "yyyy-mm-dd" format
const minDateFormatted = minDate.toISOString().split("T")[0];
const maxDateFormatted = maxDate.toISOString().split("T")[0];

// Set the dynamic minimum and maximum date values to the input element
dobInput.setAttribute("min", minDateFormatted);
dobInput.setAttribute("max", maxDateFormatted);
</script>
@endsection