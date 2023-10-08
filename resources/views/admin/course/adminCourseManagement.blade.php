@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div id="wrapper">
    <div class="text-primary bg-primary"
        style="width: 40px;background: #D9D9D9;--bs-primary: #D9D9D9;--bs-primary-rgb: 217,217,217;"></div>

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">List of
                    Courses</h3>
            </div>

            <div class="container">
                <a class="btn btn-primary m-3 " role="button"
                    style="color: #16416E;background: #ffb600;font-weight: bold; height: 32px;font-size: 14px;border-style: none;"
                    href="course/create">Add New Course</a>

                <!-- Category Permission -->
                @can('manage category')
                <a class="btn btn-primary m-3 " role="button"
                    style="color: #16416E;background: #ffb600;font-weight: bold; height: 32px;font-size: 14px;border-style: none;"
                    href="/courseCategory">Manage Categories</a>
                @endcan



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
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th style="color: #16416E;font-weight: bold;">ID</th>
                                <th style="color: #16416E;font-weight: bold;">Course Name</th>
                                <th style="color: #16416E;font-weight: bold;">Course Code</th>
                                <th style="color: #16416E;font-weight: bold;">Category</th>
                                <th style="color: #16416E;font-weight: bold;">Coordinator</th>
                                <th style="color: #16416E;font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                        $index = 0;
                                        foreach($courses as $course){

                                            $course_category = DB::table('course_categories')->where('id', $course->course_category_id)->first();
                                            $user = DB::table('users')->where('id', $course->user_id)->first();
                                            printf(
                                            "<tr> <td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",
                                            ++$index,
                                            $course->course_name,
                                            $course->short_name,
                                            $course_category->category_name,
                                            (!empty($user->fullname)) ? $user->fullname : "-"
                                        );
                                        ?>
                            <td>
                                <!-- <a href="/course/{{$course->id}}/edit"><i class="fa fa-pencil mx-1"
                                                style="font-size: 17px" aria-hidden="true"></i></a> -->
                                <a href="/course/{{$course->id}}"><i class="fa fa-eye mx-1" style="font-size: 17px"
                                        aria-hidden="true"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{$course->id}}"><i
                                        class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                        aria-hidden="true"></i></a>

                                <!-- The Modal -->
                                <div class="modal" id="myModal{{$course->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal body -->
                                            <div class="modal-body my-4 text-center h5">
                                                Are you sure?
                                                <hr>
                                                <form action="/course/{{$course->id}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <label for="password">Confirm your password
                                                        <span class="text-danger">*</span> </label>
                                                    <input type="password" class="form-control mx-2 my-3"
                                                        name="password" id="password" required>

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

                            <?php
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection