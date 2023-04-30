@extends('layouts.adminLayout')

@section('title', 'Role | Permission - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Role | User Management</h3>

        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block m-2">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block m-2">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="row">
            <!-- Role Part -->
            <div class="col-lg mx-3">
                <a class="btn btn-primary m-3" role="button"
                    style="color: #16416E;background: #ffb600;font-weight: bold;height: 32px;font-size: 14px;border-style: none;"
                    href="role/create">Add New Role</a>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="color: #16416E;font-weight: bold;">ID</th>
                                <th style="color: #16416E;font-weight: bold;">Role Name</th>
                                <th style="color: #16416E;font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            @foreach($roles as $role)

                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{$role->name}}</td>
                                <td>

                                    <a href="/role/{{$role->id}}"><i class="fa fa-eye mx-1" style="font-size: 17px"
                                            aria-hidden="true"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModalRole{{$role->id}}"><i
                                            class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                            aria-hidden="true"></i></a>

                                </td>
                            </tr>

                            <!-- The Modal -->
                            <div class="modal" id="myModalRole{{$role->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal body -->
                                        <div class="modal-body my-4 text-center h5">
                                            Are you sure?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer p-1">
                                            <form action="/role/{{$role->id}}" method="post">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Permission Part -->
            <div class="col-lg mx-3">
                <a class="btn btn-primary m-3" role="button"
                    style="color: #16416E;background: #ffb600;font-weight: bold;height: 32px;font-size: 14px;border-style: none;"
                    href="permission/create">Add New Permission</a>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="color: #16416E;font-weight: bold;">ID</th>
                                <th style="color: #16416E;font-weight: bold;">Permission Name</th>
                                <th style="color: #16416E;font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{$permission->name}}</td>
                                <td>
                                    <a href="/permission/{{$permission->id}}"><i class="fa fa-eye mx-1"
                                            style="font-size: 17px" aria-hidden="true"></i></a>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#myModalPermission{{$permission->id}}"><i
                                            class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                            aria-hidden="true"></i></a>
                                </td>
                            </tr>

                            <!-- The Modal -->
                            <div class="modal" id="myModalPermission{{$permission->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal body -->
                                        <div class="modal-body my-4 text-center h5">
                                            Are you sure?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer p-1">
                                            <form action="/permission/{{$permission->id}}" method="post">
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
                            @endforeach
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </div>
</div>
@endsection