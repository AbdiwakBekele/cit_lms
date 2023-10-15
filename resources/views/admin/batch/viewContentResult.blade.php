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


            @error('student_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <a href="#" data-bs-toggle="modal" data-bs-target="#myModalStudent"
                class="btn btn-warning text-dark m-3">Add Student</a>

            <!-- Batch Students -->
            <div class="table-responsive">
                <h4> Batch Students Result</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: #16416E;font-weight: bold;">ID</th>
                            <th style="color: #16416E;font-weight: bold;">Full Name</th>
                            <th style="color: #16416E;font-weight: bold;">Score</th>
                            <th style="color: #16416E;font-weight: bold;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($results as $result)
                        <tr>
                            <td> -</td>
                            <td> - </td>
                            <td> {{$result['score']}} </td>



                            <td>


                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection