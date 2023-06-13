@extends('layouts.studentLayout')

@section('title', 'Profile | CTI')

@section('content')

<!-- heading banner -->
<section class="heading-banner text-white " style="background:#16416E">
    <div class="container holder">
        <div class="align">
        </div>
    </div>
</section>
<!-- breadcrumb nav -->
<nav class="breadcrumb-nav">
    <div class="container">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </div>
</nav>
<!-- two columns -->
<div id="" class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        @if($student->studentDocuments->contains('document_name', 'National ID') &&
        $student->studentDocuments->contains('document_name', 'Educational'))

        <div class="alert alert-warning"> Your document is submitted | you will receive an approval email when verified
        </div>
        @else
        <div class="alert alert-danger"> Please Verify you account by providing all neccassary documents
            <a href="student_doc/{{ $student->id }}/verify" class="btn btn-danger" style="margin-left: 30px">Verify
                Now</a>
        </div>
        @endif

        <!-- User Form -->
        <a class="btn btn-warning" style="color: black" href="/my_profile/{{$student->id}}/edit"> Edit Info </a>
        <br>
        <br>

        <div class="row">
            <div class="col-lg">
                @if($student->profile_img)
                <img src="{{ asset('student_profile/' . $student->profile_img) }}" width="100px" alt="Student Image">
                @else
                <img src="{{ asset('images/AM2A1021.JPG') }} " width="100px" alt="Student Profile">
                @endif

                <br>
                <a href="/my_picture/{{$student->id}}/edit" class="btn btn-warning" style="color: black">Change
                    Profile</a>
            </div>

            <br>
            <div class="col-lg">
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
                        <td> {{$student->city}}, {{$student->subcity}}, {{$student->house_no}} </td>
                    </tr>

                    <tr>
                        <th>Facebook Username</th>
                        <td> {{$student->facebook ?? '-'}} </td>
                    </tr>

                    <tr>
                        <th>Instagram Username</th>
                        <td> {{ $student->instagram ?? '-' }} </td>
                    </tr>
                    <tr>
                        <th>Linkedin Username</th>
                        <td> {{$student->linkedin ?? '-'}} </td>
                    </tr>

                    <tr>
                        <th>Tiktok Username</th>
                        <td> {{$student->tiktok ?? '-'}} </td>
                    </tr>

                    <tr>
                        <th>Twitter Username</th>
                        <td> {{$student->twitter ?? '-'}} </td>
                    </tr>

                    <tr>
                        <th>Level of Education</th>
                        <td> {{$student->level_of_education}} </td>
                    </tr>

                    <tr>
                        <th>Work Status</th>
                        <td> {{$student->work_status}} </td>
                    </tr>

                    <tr>
                        <th>Current Occupation</th>
                        <td> {{$student->current_occupation}} </td>
                    </tr>

                    <tr>
                        <th>Work Experience</th>
                        <td> {{$student->work_experience}} </td>
                    </tr>


                </table>

            </div>

        </div>
    </div>
</div>

@endsection