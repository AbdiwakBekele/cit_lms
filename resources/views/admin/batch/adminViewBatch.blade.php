@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">List of
                Current Batches</h3>
        </div>
        <div class="container">

            <div class="alert alert-primary">

                <!-- Batch Information -->
                <div class="row">
                    <a href="/batch/{{$batch->id}}/edit" class="my-3" style="float: right; text-decoration:none;">
                        <i class="fa fa-edit" aria-hidden="true"></i> Edit Batch </a>
                    <br>
                    <div class="col-md">
                        <p><strong> Batch ID:</strong> BT/{{$batch->id}}/23</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch Name:</strong> {{$batch->batch_name}}</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch shift:</strong> {{$batch->shift}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <p> <strong>Course:</strong> {{$batch->course->course_name}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>Start date:</strong> {{$batch->starting_date}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>End date:</strong> {{$batch->ending_date}}</p>
                    </div>
                </div>
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

            <!-- Batch Contents -->
            <h4> Batch Chapters </h4>
            <div id="result"></div>
            <div class="alert alert-primary">

                @foreach($batch->course->sections as $index => $section)

                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <!-- Section Title -->
                            <a class="btn" data-bs-toggle="collapse" href="#collapse{{$section->id}}">
                                Chapter {{++$index}}. {{ $section->section_name }}
                                <i class="fa fa-caret-down mx-2" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div id="collapse{{$section->id}}" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <!-- Section Contents -->
                                @foreach($section->contents as $content_index => $content)
                                <div class="alert alert-light row">
                                    <div class="col">
                                        {{++$content_index}}. {{$content->content_name}}
                                    </div>
                                    <span class="col-2 form-check form-switch">
                                        <input class="form-check-input h5 toggleSwitch" type="checkbox"
                                            {{ ($batch->batchContents->contains('content_id', $content->id)) ? 'checked' : '' }}
                                            data-content-id="{{ $content->id }}" data-batch-id="{{ $batch->id }}">
                                        <label class=" form-check-label">Active</label>
                                    </span>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            @error('student_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <a href="#" data-bs-toggle="modal" data-bs-target="#myModalStudent"
                class="btn btn-warning text-dark m-3">Add Student</a>

            <!-- Modal | Assign Student to Course -->
            <div class="modal" id="myModalStudent">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body my-4 ">
                            <h3>Select Student</h3>

                            <form action="/add_student_batch" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="POST">
                                <!-- Batch ID -->
                                <input type="hidden" name="batch_id" value="{{$batch->id}}">

                                <!-- Course ID -->
                                <input type="hidden" name="course_id" value="{{$batch->course->id}}">

                                <!-- Student ID -->
                                <select class="form-select" name="student_id" aria-label="Select option" required>
                                    <option value="">Select Student</option>
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->fullname}} (CTI/0{{$student->id}}/23)
                                    </option>
                                    @endforeach
                                </select>

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

                                    @error('additional_info')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <hr>
                                <!-- Payment Status -->
                                <div class="mb-3 mt-3">
                                    <label for="payment_mode" class="form-label">Payment Status/Mode</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control" required>
                                        <option value="">Select your answer</option>
                                        <option value="full_payment">Full Payment</option>
                                        <option value="half_payment">Half Payment</option>
                                        <option value="sponsorship">Sponsorship</option>
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

            <!-- Batch Students -->
            <div class="table-responsive">
                <h4> Batch Students </h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: #16416E;font-weight: bold;">ID</th>
                            <th style="color: #16416E;font-weight: bold;">Full Name</th>
                            <th style="color: #16416E;font-weight: bold;">Email</th>
                            <th style="color: #16416E;font-weight: bold;">Phone</th>
                            <th style="color: #16416E;font-weight: bold;">Status</th>
                            <th style="color: #16416E;font-weight: bold;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($batch->classrooms as $index => $classroom)
                        <tr>

                            <td>{{$index + 1}}</td>
                            <td> {{$classroom->student->fullname}} </td>
                            <td> {{$classroom->student->email}} </td>
                            <td> {{$classroom->student->phone}} </td>

                            <td>
                                @if($classroom->is_approved == 1)
                                <p class="text-success"> <strong>Approved</strong> </p>
                                @else
                                <p class="text-danger"> <strong>Not Approved</strong> </p>
                                @endif

                            </td>

                            <td>
                                @if($classroom->is_approved == 1)
                                <a class="btn btn-primary" href="/disapprove_student/{{$classroom->id}}"> Dismiss </a>
                                @else
                                <a class="btn btn-primary" href="/approve_student/{{$classroom->id}}"> Approve </a>
                                @endif

                                <!-- View -->
                                <a href="/batch_student_progress/{{$classroom->id}}">
                                    <i class="fa fa-eye mx-1" style="font-size: 17px" aria-hidden="true"></i>
                                </a>

                                <!-- Delete -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{$classroom->id}}">
                                    <i class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                        aria-hidden="true"></i>
                                </a>

                                <!-- The Modal -->
                                <div class="modal" id="myModal{{$classroom->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal body -->
                                            <div class="modal-body my-4 text-center h5">
                                                Are you sure?
                                                <hr>
                                                <form action="/unenroll_student/{{$classroom->id}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <label for="password"> Confirm your password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control mx-2 my-3" required>
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer p-1">


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Get all toggle switch elements
    var toggleSwitches = document.querySelectorAll('.toggleSwitch');

    toggleSwitches.forEach(function(toggleSwitch) {
        toggleSwitch.addEventListener('change', function() {
            var content_id = toggleSwitch.getAttribute('data-content-id');
            var batch_id = toggleSwitch.getAttribute('data-batch-id');

            if (toggleSwitch.checked) {
                $.ajax({
                    url: '/batch_content',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        content_id: content_id,
                        batch_id: batch_id
                    },
                    success: function(response) {
                        $('#result').html(response.message);
                    },
                    error: function(error) {
                        console.error(
                            'Error submitting content ID to batch_content model: ' +
                            error);
                    }
                });
            } else {

                $.ajax({
                    url: '/batch_content/dismiss_content',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        content_id: content_id,
                        batch_id: batch_id
                    },
                    success: function(response) {
                        $('#result').html(response.message);
                    },
                    error: function(error) {
                        console.error(
                            'Error submitting content ID to batch_content model: ' +
                            error);
                    }
                });

            }
        });
    });
});
</script>



@endsection