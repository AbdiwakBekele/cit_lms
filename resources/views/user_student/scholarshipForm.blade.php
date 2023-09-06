<!DOCTYPE html>
<html>

    <head>
        <!-- set the encoding of your site -->
        <meta charset="utf-8">
        <!-- set the viewport width and initial-scale on mobile devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- set the HandheldFriendly -->
        <meta name="HandheldFriendly" content="True">
        <!-- set the description -->
        <meta name="description" content="CTI LMS">
        <!-- set the Keyword -->
        <meta name="keywords" content="">
        <meta name="author" content="CTI LMS">
        <!-- include google roboto font cdn link -->
        <link rel="shortcut icon" href=" {{ asset('images/wAsset 3@300x.png') }} " type="image/x-icon">
        <link
            href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
            rel="stylesheet">
        <!-- include the site bootstrap stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/bootstrap.css') }} ">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/plugins.css') }} ">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/colors.css') }} ">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href=" {{ asset('style.css') }}  ">
        <!-- include the site responsive stylesheet -->
        <link rel="stylesheet" href=" {{ asset('css/responsive.css') }} ">
        <title>Scholarship - CTI</title>


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

    </head>

    <body>
        <!-- main container of all the page elements -->
        <div id="wrapper">
            <!-- header of the page///////////////////////// -->

            <header id="page-header" class="page-header-stick">
                <!-- top bar -->
                <div class="top-bar bg-primary ">
                    <div class="container">
                        <div class="row top-bar-holder">
                            <div class="col-xs-9 col">
                                <!-- bar links -->
                                <ul class="font-lato list-unstyled bar-links">
                                    <li>
                                        <a href="tel:+251929737373">

                                            <strong class="dt element-block text-capitalize hd-phone text-white">Call
                                                :</strong>
                                            <strong class="dd element-block hd-phone text-white">+251 929
                                                737373</strong>
                                            <i class="fas fa-phone-square hd-up-phone hidden-sm hidden-md hidden-lg"><span
                                                    class="sr-only">phone</span></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@edu-cti.com;">
                                            <strong class="dt element-block text-capitalize hd-phone text-white">Email
                                                :</strong>
                                            <strong
                                                class="dd element-block hd-phone text-white">info@edu-cti.com</strong>
                                            <i class="fas fa-envelope-square hd-up-phone hidden-sm hidden-md hidden-lg"><span
                                                    class="sr-only">email</span></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-3 col justify-end">
                                <!-- user links -->
                                <ul class="list-unstyled user-links fw-bold font-lato">

                                    @auth('student')
                                    Welcome | {{auth('student')->user()->fullname}}
                                    @else
                                    <li><a href="/student_login">Login</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </header>


            <!-- contain main informative part of the site ////////////// -->
            <main id="main">
                <div class="form-container container ">

                    <br>
                    <h3 class="form-title m-3">Apply for Scholarship</h3>
                    <br>

                    @if(session()->has('error'))
                    <div class="alert alert-danger"> {{ session('error') }} </div>
                    @endif

                    @if(session()->has('success'))
                    <div class="alert alert-success"> {{ session('success') }} </div>
                    @endif

                    <!-- Student Registration Form -->
                    <form action="/scholarship" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="POST">

                        <!-- Personal Information -->
                        <div class="form-input">
                            <label for="fullname">Student Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                placeholder="Enter Student Fullname" required>
                            @error('fullname')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-input">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email Address"
                                name="email" required>
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
                            <input type="tel" class="form-control" id="phone" placeholder="Enter Phone number"
                                name="phone" pattern="\d{10}" required>
                            @error('phone')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="form-input">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city"
                                required>
                            @error('city')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Subcity -->
                        <div class="form-input">
                            <label for="subcity">Subcity | Kebele | Wereda</label>
                            <input type="text" class="form-control" id="subcity" placeholder="Enter Subcity"
                                name="subcity" required>
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
                            <input type="text" class="form-control" id="current_occupation" placeholder="Enter Status"
                                name="current_occupation" required>
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
                                <option value="< 1 year">
                                    < 1 year</option>
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
                                <option value="{{$course->id}}">{{$course->course_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('course_id')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Upload Resume -->
                        <div class="form-input">
                            <label for="resume">Upload Resume</label> <i>(pdf format)</i>
                            <input type="file" class="form-control" id="resume" placeholder="Upload Resume"
                                name="resume" required>
                            @error('resume')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Financial Statement -->
                        <div class="form-input">
                            <label for="financial">Financial Information</label> <i>(pdf format)</i>
                            <input type="file" class="form-control" id="financial" placeholder="Upload financial info"
                                name="financial" required>
                            @error('financial')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Additional Info -->
                        <div class="form-input">
                            <label for="essay">Write a 2 paragraph essay about your self, career goals and
                                personal experiences</label>
                            <textarea class="form-control" id="essay" name="essay" rows="4"></textarea>
                        </div>
                        @error('essay')
                        <span class="error-message">{{ $message }}</span>
                        @enderror

                        <!-- Submit Button -->
                        <input type="submit" name="submit" class="form-submit" value="Submit">
                    </form>
                </div>

            </main>

            <!-- footer area container -->
            @include('include.studentFooter', ['courses'=> $courses])

            <!-- back top of the page -->
            <span id="back-top" class="text-center fa fa-caret-up"></span>
            <!-- loader of the page -->
            <div id="loader" class="loader-holder">
                <div class="block"><img src="{{ asset('images/svg/hearts.svg') }} " width="100" alt="loader"></div>
            </div>
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

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}  "></script>
        <script src="{{ asset('js/jquery.main.js') }} "></script>
        <script type="text/javascript" src=" {{ asset('js/init.js') }} "></script>
    </body>

</html>