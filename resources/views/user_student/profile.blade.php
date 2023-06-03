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
    <div class="row">

        <br>
        <div class="alert alert-danger"> Please Verify you account by providing all neccassary documents
            <a href="#" class="btn btn-danger" style="margin-left: 30px">Verify Now</a>
        </div>
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
                        <td> {{$student->address}} </td>
                    </tr>


                </table>

            </div>

        </div>


    </div>
</div>

@endsection