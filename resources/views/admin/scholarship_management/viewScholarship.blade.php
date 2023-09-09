@extends('layouts.adminLayout')

@section('title', 'Scholarships - CTI')

@section('content')

<div id="wrapper">
    <div class="text-primary bg-primary"
        style="width: 40px;background: #D9D9D9;--bs-primary: #D9D9D9;--bs-primary-rgb: 217,217,217;"></div>

    <div class="d-flex flex-column" id="content-wrapper">
        <div class="container" id="content">
            <div class="container-fluid">
                <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Scholarship
                    Applicant Details</h3>
            </div>
            <hr>
            <p class="mx-4">Application Date: {{$scholarship->created_at}}</p>
            <hr>

            <div class="container">

                <div class="row mx-5">
                    @if(!empty($scholarship->resume))
                    <div class="col">
                        <a href="#">
                            <i class="fa fa-file-text" style="font-size: 30px" aria-hidden="true"></i>
                            <br>
                            Download Resume
                        </a>
                    </div>

                    @endif

                    @if(!empty($scholarship->financial))
                    <div class="col">
                        <a href="#">
                            <i class="fa fa-file-text" style="font-size: 30px" aria-hidden="true"></i>
                            <br>
                            Download Financial Doc
                        </a>
                    </div>

                    @endif
                </div>

                <hr>

                <h4> Course: {{$scholarship->course->course_name}} </h4>
                <hr>

                <p> Fullname: <strong> {{$scholarship->fullname}} </strong> </p>

                <p> Email: <strong> {{$scholarship->email}} </strong> </p>

                <p> Phone: <strong> {{$scholarship->phone}} </strong> </p>

                <p> Age: <strong> {{$scholarship->age}} </strong> </p>

                <p> Gender: <strong> {{$scholarship->gender}} </strong> </p>

                <p> Address: <strong> {{$scholarship->city}}, {{$scholarship->subcity}} </strong> </p>
                <hr>

                <p> Level of Education: <strong> {{$scholarship->level_of_education}} </strong> </p>

                <p> Work Status: <strong> {{$scholarship->work_status}} </strong> </p>

                <p> Current Occupation: <strong> {{$scholarship->current_occupation}} </strong> </p>

                <p> Work Experience: <strong> {{$scholarship->work_experience}} </strong> </p>

                <hr>

                <p> Essay: <br> <strong> {{$scholarship->essay}} </strong> </p>


            </div>
        </div>
    </div>
</div>

@endsection