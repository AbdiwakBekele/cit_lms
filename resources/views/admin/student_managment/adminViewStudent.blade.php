@extends('layouts.adminLayout')

@section('title', 'Student Management - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Student Detail</h3>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @error('student_id')
        <div class="alert alert-danger"> {{ $message }}</div>
        @enderror

        <!-- User Form -->
        <div class="m-3 p-3 ">

            <a class="btn btn-warning m-4" href="/student/{{$student->id}}/edit"> Edit Info </a>

            <div class="row alert alert-primary ">
                <div class="col-lg">
                    <!-- Profile Image -->
                    @if($student->profile_img)
                    <img class="img-fluid" src=" {{ asset('student_profile/'.$student->profile_img) }} ">

                    @else
                    <img class="img-fluid" src=" {{ asset('images/AM2A1021.JPG') }} ">
                    @endif

                </div>
                <div class="col-lg-8">
                    <table class="table table-hover ">
                        <tr>
                            <th>Full name</th>
                            <td> {{$student->fullname}} </td>
                        </tr>

                        <tr>
                            <th>Email Address</th>
                            <td> {{$student->email}} </td>
                        </tr>

                        <tr>
                            <th>Age</th>
                            <td> {{$student->age}} </td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td> {{$student->phone}} </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td> {{$student->city}}, {{$student->subcity}}, H.No: {{$student->house_no}} </td>
                        </tr>

                        <tr>
                            <th>Facebook Username</th>
                            <td> {{$student->facebook}}</td>
                        </tr>
                        <tr>
                            <th>Instagram Username</th>
                            <td> {{$student->instagram}}</td>
                        </tr>

                        <tr>
                            <th>LinkedIn Username</th>
                            <td> {{$student->linkedin}}</td>
                        </tr>

                        <tr>
                            <th>Tiktok Username</th>
                            <td> {{$student->tiktok}}</td>
                        </tr>
                        <tr>
                            <th>Twitter Username</th>
                            <td> {{$student->twitter}}</td>
                        </tr>

                        <tr>
                            <th>Level of Education</th>
                            <td> {{$student->level_of_education}}</td>
                        </tr>

                        <tr>
                            <th>Work Status</th>
                            <td> {{$student->work_status}}</td>
                        </tr>

                        <tr>
                            <th>Current Occupation</th>
                            <td> {{$student->current_occupation}}</td>
                        </tr>

                        <tr>
                            <th>Work Experience</th>
                            <td> {{$student->work_experience}}</td>
                        </tr>


                    </table>

                </div>

            </div>


            <a href="#" data-bs-toggle="modal" data-bs-target="#myModalStudent"
                class="btn btn-warning text-dark m-3">Assign to Course Batch</a>

            <!-- Modal | Deleting Section -->
            <div class="modal" id="myModalStudent">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body my-4 text-center h5">
                            <h3>Select Student</h3>

                            <form action="/add_student_batch" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="student_id" value="{{$student->id}}">

                                <!-- Course -->
                                <div>
                                    <label for="course">Course:</label>
                                    <select id="course" class="form-control" name="course_id">
                                        <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }} |
                                            {{$course->course_price}} ETB</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Batch -->
                                <div>
                                    <label for="batch">Batch:</label>
                                    <select id="batch" class="form-control" name="batch_id">
                                        <option value="">Select Batch</option>
                                    </select>
                                </div>

                                <!-- Are your working in this field -->
                                <div class="mb-3 mt-3">
                                    <label for="working_in_the_field" class="form-label">Are you currently working in
                                        this field</label>
                                    <select name="working_in_the_field" id="working_in_the_field" class="form-control"
                                        required>
                                        <option value="">Select your answer</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">no</option>
                                    </select>

                                    @error('working_in_the_field')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Why are you interested -->
                                <div class="mb-3 mt-3">
                                    <label for="why_interested">Why are you interested in this
                                        course?</label>
                                    <select name="why_interested" id="why_interested" class="form-control" required>
                                        <option value="">Select your answer</option>
                                        <option value="to_change_my_existing_profession">To change my existing
                                            profession</option>
                                        <option value="for_my_personal_interest">For my personal interest / business
                                        </option>
                                        <option value="to_advance_my_current_position">To advance my current position.
                                        </option>
                                        <option value="others">Others</option>
                                    </select>

                                    @error('why_interested')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- How did you hear -->
                                <div class="mb-3 mt-3">
                                    <label for="how_did_you_hear" class="form-label">How did you hear about the digital
                                        training
                                        available at CTI?</label>
                                    <select name="how_did_you_hear" id="how_did_you_hear" class="form-control" required>
                                        <option value="">Select your answer</option>
                                        <option value="print_ads">Through print advertisement</option>
                                        <option value="social_media">Social Media</option>
                                        <option value="referral_from_friend">Referral from a friend or colleague
                                        </option>
                                        <option value="tv">TV</option>
                                        <option value="others">Others</option>
                                    </select>

                                    @error('how_did_you_hear')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Type of Training -->
                                <div class="mb-3 mt-3">
                                    <label for="type_of_training" class="form-label">Type of Training</label>
                                    <select name="type_of_training" id="type_of_training" class="form-control" required>
                                        <option value="">Select your answer</option>
                                        <option value="normal">Normal Training</option>
                                        <option value="special">Special Needs Training</option>
                                    </select>

                                    @error('type_of_training')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Additional Info -->
                                <div class="form-group">
                                    <label for="additional_info">Please list any relevant experience or qualification
                                        you have that you
                                        feel may be helpful for the training.</label>
                                    <textarea class="form-control" id="additional_info" name="additional_info"
                                        rows="4"></textarea>
                                </div>

                                @error('additional_info')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>

                                <hr>

                                <!-- Payment Status -->
                                <div class="mb-3 mt-3">
                                    <label for="payment_mode" class="form-label">Payment Status/Mode</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control" required>
                                        <option value="">Select your answer</option>
                                        <option value="normal">Full Payment</option>
                                        <option value="special">Half Payment</option>
                                    </select>

                                    @error('payment_mode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Payment Type -->
                                <div class="mb-3 mt-3">
                                    <label for="payment_type" class="form-label">Payment Type</label>
                                    <select name="payment_type" id="payment_type" class="form-control" required>
                                        <option value="">Select your answer</option>
                                        <option value="Cash">In Cash</option>
                                        <option value="Receipt">Receipt</option>
                                        <option value="Online">Online</option>
                                    </select>

                                    @error('payment_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <hr>

                                <div class="form-check m-2">
                                    <p> <strong>
                                            By selecting below, you agree to the rights, responsibilities, and
                                            policies stated above
                                            and
                                            to attend all classes, and complete all assignments required to
                                            successfully complete
                                            digital marketing training
                                        </strong> </p>
                                    <input class="form-check-input" type="checkbox" id="agree_check" required>
                                    <label class="form-check-label" for="agree_check"> <strong>I Agree</strong>
                                    </label>
                                </div>


                                <input type="submit" class="btn btn-primary m-2" value="Select">
                                <button type="button" class="btn btn-light m-2" data-bs-dismiss="modal">Close</button>
                            </form>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer p-1">

                        </div>

                    </div>
                </div>
            </div>



            <div class="alert alert-primary">
                <strong>Enrolling Course</strong>

                @foreach($student->classrooms as $classroom)
                <div class="alert alert-light">
                    <strong>{{$classroom->course->course_name}} </strong>
                    <span> | {{$classroom->batch->shift}} shift</span>

                </div>

                @endforeach


            </div>
        </div>



    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.getElementById('course').addEventListener('change', function() {
    fetchBatches(this.value);
});

function fetchBatches(courseId) {
    fetch('/form/batches', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                course_id: courseId
            })
        })
        .then(response => response.json())
        .then(data => {
            const batchSelect = document.getElementById('batch');
            batchSelect.innerHTML = '';
            data.forEach(batch => {
                const option = document.createElement('option');
                option.value = batch.id;
                option.innerText = batch.shift;
                batchSelect.appendChild(option);
            });
        });
}
</script>

@endsection