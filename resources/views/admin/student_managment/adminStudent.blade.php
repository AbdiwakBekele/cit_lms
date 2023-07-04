@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Student
                Management</h3>
        </div>
        <div class="container">
            <a class="btn btn-primary m-3" role="button"
                style="color: #16416E;background: #ffb600;font-weight: bold; height: 32px;font-size: 14px;border-style: none;"
                href="student/create">Add New Student</a>

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block m-3">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block m-3">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: #16416E;font-weight: bold;">No</th>
                            <th style="color: #16416E;font-weight: bold;">ID</th>
                            <th style="color: #16416E;font-weight: bold;">Full Name</th>
                            <th style="color: #16416E;font-weight: bold;">Age</th>
                            <th style="color: #16416E;font-weight: bold;">Email</th>
                            <th style="color: #16416E;font-weight: bold;">Phone</th>
                            <th style="color: #16416E;font-weight: bold;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($students as $index => $student)
                        <td>{{$index + 1}}</td>
                        <td> CTI{{$student->id}}/23 </td>
                        <td>{{$student->fullname}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>




                        <td>
                            <a href="/student/{{$student->id}}"><i class="fa fa-eye mx-1" style="font-size: 17px"
                                    aria-hidden="true"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{$student->id}}"><i
                                    class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                    aria-hidden="true"></i></a>

                            <!-- The Modal -->
                            <div class="modal" id="myModal{{$student->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal body -->
                                        <div class="modal-body my-4 text-center h5">
                                            Are you sure?
                                            <hr>
                                            <form action="/student/{{$student->id}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <label for="password">Confirm your password
                                                    <span class="text-danger">*</span> </label>
                                                <input type="password" class="form-control mx-2 my-3" name="password"
                                                    id="password" placeholder="password" required>

                                                <input type="submit" class="btn btn-danger" value="Delete">

                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>

                                            </form>
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
@endsection