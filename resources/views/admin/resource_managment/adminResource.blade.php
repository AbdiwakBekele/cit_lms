@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Resource
                Management</h3>
        </div>

        <div class="container"><a class="btn btn-primary" role="button"
                style="color: #16416E;background: #ffb600;font-weight: bold;width: 182.3px;height: 32px;font-size: 14px;border-style: none;"
                href="resource/create">Add New Resource</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: #16416E;font-weight: bold;">No</th>
                            <th style="color: #16416E;font-weight: bold;">Resource Name</th>
                            <th style="color: #16416E;font-weight: bold;">Resource Course</th>
                            <th style="color: #16416E;font-weight: bold;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                        $index = 0;
                                        foreach($resources as $resource){

                                            $course = DB::table('courses')->where('id', $resource->course_id)->first();
                                            printf(
                                            "<tr> <td>%d</td> <td>%s</td> <td>%s</td>",
                                            ++$index,
                                            $resource->path,
                                            $course->course_name
                                        );
                                        ?>
                        <td>
                            <a href="/resource/{{$resource->id}}/download"><i class="fa fa-download mx-1"
                                    style="font-size: 17px" aria-hidden="true"></i></a>

                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{$resource->id}}"><i
                                    class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                    aria-hidden="true"></i></a>

                            <!-- The Modal -->
                            <div class="modal" id="myModal{{$resource->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal body -->
                                        <div class="modal-body my-4 text-center h5">
                                            Are you sure?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer p-1">
                                            <form action="/resource/{{$resource->id}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
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
@endsection