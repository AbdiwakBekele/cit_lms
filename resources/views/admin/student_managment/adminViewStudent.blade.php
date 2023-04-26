@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Student Detail</h3>
        </div>

        <!-- User Form -->
        <div class="m-3 p-3 ">

            <a class="btn btn-warning m-4" href="/student/{{$student->id}}/edit"> Edit Info </a>

            <div class="row alert alert-primary ">
                <div class="col-lg">
                    <p>photo</p>

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
                            <td> {{$student->address}} </td>
                        </tr>


                    </table>

                </div>

            </div>




        </div>



    </div>
</div>
@endsection