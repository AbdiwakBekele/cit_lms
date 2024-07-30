@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">List of
                        Current Batches</h3>
                </div>
                <div class="col">



                    <!-- Report -->
                    <a href="#" class="btn btn-primary mt-4 me-4" style="float: right" data-bs-toggle="modal" data-bs-target="#report">Report </a>

                    <!-- Report Modal -->
                    <div class="modal" id="report">
                        <div class="modal-dialog" style="max-width: 60%">
                            <div class="modal-content">

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <!-- Header -->
                                    <div class="m-3">
                                        <h4 style="text-align: center; font-family: 'Times New Roman', Times, serif;">
                                            <strong>
                                                CALIFORNIA TRAINING INSTITUTE
                                            </strong></h3>
                                            <h5 style="text-align: center; font-family: 'Times New Roman', Times, serif;">
                                                <strong>
                                                    Institutional and Cooperative Training
                                                    Assessment
                                                </strong>
                                        </h4>
                                    </div>

                                    <!-- Course | Batch | Student Info -->
                                    <div class="row">
                                        <div class="col-8 m-4">
                                            <p> <strong>Date:</strong> 09/06/2024</p>
                                            <p> <strong>Unit of Competency:</strong> {{$classroom->course->course_name}}
                                            </p>
                                            <p> <strong>Module Code:</strong> {{$classroom->course->short_name}}</p>
                                            <p> <strong>Batch Number:</strong> BT/{{$classroom->batch->batch_name}}/23
                                            </p>
                                            <p> <strong>Total Hour:</strong> 120</p>

                                            <p><strong>Student Name: </strong> {{$classroom->student->fullname}}</p>
                                        </div>

                                        <div class="col">
                                            <div style="border: 1px solid black; width: 150px; height: 200px;">
                                                Photo
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Score Table -->
                                    <div>
                                        <table class="table table-stripe m-4 ">
                                            <tr>
                                                <th>Sessions</th>
                                                <th>L01</th>
                                                <th>L02</th>
                                                <th>L03</th>
                                                <th>L04</th>
                                                <th>Average</th>
                                            </tr>

                                            <tr>
                                                <td><strong>Theory (30%)</strong></td>
                                                <td>{{$classroom->classroomResult->theory_l01 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->theory_l02 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->theory_l03 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->theory_l04 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->theory_avg ?? '-'}}</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Practice (40%)</strong></td>
                                                <td>{{$classroom->classroomResult->practice_l01 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->practice_l02 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->practice_l03 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->practice_l04 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->practice_avg ?? '-'}}</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Cooperative Training (30%)</strong></td>
                                                <td>{{$classroom->classroomResult->cooperative_l01 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->cooperative_l02 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->cooperative_l03 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->cooperative_l04 ?? '-'}}</td>
                                                <td>{{$classroom->classroomResult->cooperative_avg ?? '-'}}</td>
                                            </tr>
                                        </table>

                                        <table class="table table-stripe w-25" style="float: right;">
                                            <tr>
                                                <th>Total</th>
                                                <td>{{$classroom->classroomResult->total ?? '-'}}</td>
                                            </tr>

                                            <tr>
                                                @php
                                                $grade = $classroom->classroomResult->total ?? null;
                                                @endphp
                                                <th>Grade</th>
                                                <td>
                                                    @if($grade >= 95)
                                                    A+
                                                    @elseif($grade >= 92)
                                                    A
                                                    @elseif($grade >= 89)
                                                    A-
                                                    @elseif($grade >= 86)
                                                    B+
                                                    @elseif($grade >= 83)
                                                    B
                                                    @elseif($grade >= 80)
                                                    B-
                                                    @elseif($grade >= 77)
                                                    C+
                                                    @elseif($grade >= 74)
                                                    C
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Signature -->
                                    <div class="my-5" style="clear: both;">
                                        <hr>
                                        <p> <strong>Name of Instructor: __________________________</strong></p>
                                        <br>
                                        <p><strong>Signature: ____________________________________</strong> </p>
                                    </div>


                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="printModal()">Print</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Add Grade -->
                    <a href="/classroom_result/create" class="btn btn-primary mt-4 me-4" style="float: right" data-bs-toggle="modal" data-bs-target="#add_grade"> Add Grade
                    </a>
                    <!-- Add Grade Modal -->
                    <div class="modal" id="add_grade">
                        <div class="modal-dialog" style="max-width: 60%">
                            <div class="modal-content">

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <!-- Header -->
                                    <div class="m-3">
                                        <h4 style="text-align: center; font-family: 'Times New Roman', Times, serif;">
                                            <strong>
                                                CALIFORNIA TRAINING INSTITUTE
                                            </strong></h3>
                                            <h5 style="text-align: center; font-family: 'Times New Roman', Times, serif;">
                                                <strong>
                                                    Institutional and Cooperative Training
                                                    Assessment
                                                </strong>
                                        </h4>
                                    </div>

                                    <!-- Course | Batch | Student Info -->
                                    <div class="m-4">
                                        <p> <strong>Unit of Competency:</strong> {{$classroom->course->course_name}}</p>
                                        <p> <strong>Module Code:</strong> {{$classroom->course->short_name}}</p>
                                        <p> <strong>Batch Number:</strong> BT/{{$classroom->batch->batch_name}}/23</p>
                                        <p> <strong>Total Hour:</strong> 120</p>
                                        <p><strong>Student Name: </strong> {{$classroom->student->fullname}}</p>
                                    </div>
                                    <hr>

                                    <form action="/classroom_result" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="classroom_id" value="{{$classroom->id}}">

                                        <!-- Theory Session -->
                                        <h5><strong>THEORY</strong></h5>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="theory_l01" class="form-label">L01 - Preparing Electronic
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="theory_l01" id="theory_l01" required>
                                                @error('theory_l01')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">
                                                <label for="theory_l02" class="form-label">L02 - Use Business Website
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="theory_l02" id="theory_l02" required>
                                                @error('theory_l02')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="theory_l03" class="form-label">L03 - Use Electronic
                                                    Marketing
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="theory_l03" id="theory_l03" required>
                                                @error('theory_l03')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">
                                                <label for="theory_l04" class="form-label">L04 - Monitoring and
                                                    Evaluation
                                                    result of e-Marketing
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="theory_l04" id="theory_l04" required>
                                                @error('theory_l04')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- Practical Session -->
                                        <h5><strong>PRACTICE</strong></h5>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="practice_l01" class="form-label">L01 - Preparing Electronic
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="practice_l01" id="practice_l01" required>
                                                @error('practice_l01')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">
                                                <label for="practice_l02" class="form-label">L02 - Use Business Website
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="practice_l02" id="practice_l02" required>
                                                @error('practice_l02')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="practice_l03" class="form-label">L03 - Use Electronic
                                                    Marketing
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="practice_l03" id="practice_l03" required>
                                                @error('practice_l03')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">
                                                <label for="practice_l04" class="form-label">L04 - Monitoring and
                                                    Evaluation
                                                    result of e-Marketing
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="practice_l04" id="practice_l04" required>
                                                @error('practice_l04')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- Cooperative Session -->
                                        <h5><strong>COOPERATIVE TRAINING</strong></h5>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="cooperative_l01" class="form-label">L01 - Preparing
                                                    Electronic
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="cooperative_l01" id="cooperative_l01" required>
                                                @error('cooperative_l01')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">
                                                <label for="cooperative_l02" class="form-label">L02 - Use Business
                                                    Website
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="cooperative_l02" id="cooperative_l02" required>
                                                @error('cooperative_l02')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="cooperative_l03" class="form-label">L03 - Use Electronic
                                                    Marketing
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="cooperative_l03" id="cooperative_l03" required>
                                                @error('cooperative_l03')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">
                                                <label for="cooperative_l04" class="form-label">L04 - Monitoring and
                                                    Evaluation
                                                    result of e-Marketing
                                                    Advertisements</label>
                                                <input type="text" class="form-control" name="cooperative_l04" id="cooperative_l04" required>
                                                @error('cooperative_l04')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <input type="submit" name="submit" class="btn btn-warning btn-lg">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="container">

            <!-- Batch Information -->
            <div class="alert alert-primary">
                <div class="row">

                    <div class="col-md">
                        <p><strong> Batch ID:</strong> BT/{{$classroom->batch->id}}/23</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch Name:</strong> {{$classroom->batch->batch_name}}</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch shift:</strong> {{$classroom->batch->shift}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <p> <strong>Course:</strong> {{$classroom->course->course_name}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>Start date:</strong> {{$classroom->batch->starting_date}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>End date:</strong> {{$classroom->batch->ending_date}}</p>
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

            @error('student_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Student Status -->
            <h4>Student Status</h4>
            <div class="alert alert-primary m-1 row">

                <div class="col-md">
                    <p><strong> Student ID:</strong> CTI/{{$classroom->student->id}}/23</p>
                </div>

                <div class="col-md">
                    <p><strong> Student Name:</strong> {{$classroom->student->fullname}}</p>
                </div>

                <div class="col-md">
                    <p><strong> Enrolled Date:</strong> {{$classroom->created_at}}</p>
                </div>
            </div>

            <hr>
            <h4> Chapter Progress </h4>

            <div class="alert alert-primary">

                @foreach($classroom->batch->course->sections as $index => $section)

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
                                    @php
                                    $progress = $classroom->progress->where('content_id', $content->id)->first();
                                    @endphp

                                    @if($progress && $progress->has_taken == 1)
                                    <div class="col-2">
                                        <p>Exam Taken</p>
                                    </div>

                                    <div class="col-2">
                                        <p>Score: {{$progress->score}}</p>
                                    </div>

                                    <div class="col-2">
                                        <a href="/review_quiz/{{$classroom->id}}/{{$content->id}}">Review Quiz</a>
                                    </div>
                                    @endif

                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
    </div>
</div>

<script>
    function printModal() {
        var printContents = document.querySelector('#report .modal-body').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;

        location.reload(); // To reload the page and restore the original contents
    }
</script>
@endsection