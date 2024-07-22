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
                    <a href="#" class="btn btn-primary mt-4 me-4" style="float: right" data-bs-toggle="modal"
                        data-bs-target="#report">Report </a>

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
                                            <h5
                                                style="text-align: center; font-family: 'Times New Roman', Times, serif;">
                                                <strong>
                                                    Institutional and Cooperative Training
                                                    Assessment
                                                </strong>
                                        </h4>
                                    </div>

                                    <!-- Course | Batch | Student Info -->
                                    <div class="m-4">
                                        <p> <strong>Date:</strong> 09/06/2024</p>
                                        <p> <strong>Unit of Competency:</strong> {{$classroom->course->course_name}}</p>
                                        <p> <strong>Module Code:</strong> {{$classroom->course->short_name}}</p>
                                        <p> <strong>Batch Number:</strong> BT/{{$classroom->batch->batch_name}}/23</p>
                                        <p> <strong>Total Hour:</strong> 120</p>

                                        <p><strong>Student Name: </strong> {{$classroom->student->fullname}}</p>
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
                                                <td>24.3</td>
                                                <td>28.7</td>
                                                <td>25.1</td>
                                                <td>26.4</td>
                                                <td>25.7</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Practice (30%)</strong></td>
                                                <td>33.1</td>
                                                <td>37.4</td>
                                                <td>35.1</td>
                                                <td>39.5</td>
                                                <td>36.7</td>
                                            </tr>

                                            <tr>
                                                <td><strong>Cooperative Training (30%)</strong></td>
                                                <td>27</td>
                                                <td>26</td>
                                                <td>25</td>
                                                <td>27</td>
                                                <td>26.3</td>
                                            </tr>
                                        </table>

                                        <table class="table table-stripe w-25" style="float: right;">
                                            <tr>
                                                <th>Total</th>
                                                <td>88.7</td>
                                            </tr>

                                            <tr>
                                                <th>Grade</th>
                                                <td>B+</td>
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