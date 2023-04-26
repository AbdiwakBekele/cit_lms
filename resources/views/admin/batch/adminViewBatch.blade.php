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
                        <p> <strong>Course:</strong> {{$course->course_name}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>Start date:</strong> {{$batch->starting_date}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>End date:</strong> {{$batch->ending_date}}</p>
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

                        <?php 
                                        $index = 0;
                                        foreach($classrooms as $classroom){
                                        
                                        echo "<br>";
                                        
                                        $student = DB::table('students')->where('id', $classroom->student_id)->first();

                                        printf(
                                            " <td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",
                                            ++$index,
                                            $student->fullname,
                                            $student->age,
                                            $student->email,
                                            $student->phone,
                                            $student->address,
                                        );
                                        ?>


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

                        <?php
                                    }
                                    ?>
                    </tbody>
                </table>
            </div>




        </div>
    </div>
</div>
@endsection