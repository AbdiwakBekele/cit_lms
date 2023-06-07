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
                    <div class="col-md">
                        <p><strong> Batch shift:</strong> {{$batch->shift}}</p>
                    </div>

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

            <a href="#" data-bs-toggle="modal" data-bs-target="#myModalStudent"
                class="btn btn-warning text-dark m-3">Add Student</a>

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
                                <input type="hidden" name="batch_id" value="{{$batch->id}}">
                                <input type="hidden" name="course_id" value="{{$batch->course->id}}">
                                <select class="form-select" name="student_id" aria-label="Select option" required>
                                    <option value="">Select Student</option>
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->fullname}} (CTI0{{$student->id}}/23)
                                    </option>
                                    @endforeach
                                </select>

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
                            <th style="color: #16416E;font-weight: bold;">Age</th>
                            <th style="color: #16416E;font-weight: bold;">Email</th>
                            <th style="color: #16416E;font-weight: bold;">Phone</th>
                            <th style="color: #16416E;font-weight: bold;">Address</th>
                            <th style="color: #16416E;font-weight: bold;">Status</th>
                            <th style="color: #16416E;font-weight: bold;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($batch->classrooms as $index => $classroom)

                        <td>{{$index + 1}}</td>
                        <td> {{$classroom->student->fullname}} </td>
                        <td> {{$classroom->student->age}} </td>
                        <td> {{$classroom->student->email}} </td>
                        <td> {{$classroom->student->phone}} </td>
                        <td> {{$classroom->student->address}} </td>

                        @if($classroom->is_approved == 1)

                        <td>
                            <p class="text-success"> <strong>Approved</strong> </p>

                        </td>

                        <td>
                            <a class="btn btn-primary" href="/disapprove_student/{{$classroom->id}}">Dismiss</a>

                        </td>



                        @endif

                        @if($classroom->is_approved == 0)

                        <td>
                            <p class="text-danger"> <strong>Not Approved</strong> </p>
                        </td>

                        <td>
                            <a class="btn btn-primary" href="/approve_student/{{$classroom->id}}">Approve
                            </a>
                        </td>

                        @endif

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>




        </div>
    </div>
</div>
@endsection