@extends('layouts.adminLayout')

@section('title', 'Role | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                User Detail</h3>

            <!-- User Form -->
            <div class="m-3 p-3 ">

                <a class="btn btn-warning m-4" href="/user/{{$user->id}}/edit"> Edit Info </a>

                <!-- User Info -->
                <div class="row alert alert-primary ">
                    <div class="col-lg">
                        <p>photo</p>

                    </div>
                    <div class="col-lg-8">
                        <table class="table table-hover ">
                            <tr>
                                <th>Full name</th>
                                <td> {{$user->fullname}} </td>
                            </tr>

                            <tr>
                                <th>Email Address</th>
                                <td> {{$user->email}} </td>
                            </tr>

                            <tr>
                                <th>Age</th>
                                <td> {{$user->age}} </td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td> {{$user->phone}} </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td> {{$user->address}} </td>
                            </tr>


                        </table>

                    </div>
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

                <!-- Role | Permission -->
                <div class="row">
                    <!-- User Role -->
                    <div class="col m-3">
                        <h5>Roles</h5>
                        <hr>

                        @foreach($user_roles as $user_role)
                        <div class="alert alert-info w-75 mx-5"> {{$user_role->name}}
                            <a href="/user/{{$user->id}}/revoke_role/{{$user_role->id}}" style="float:right">
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                            </a>
                        </div>
                        @endforeach
                        <hr>
                        <!-- Assigned Role -->
                        <form action="/user/assign_role" method="post">
                            @csrf

                            <div class="my-3">
                                <label for="assigned_role" class="form-label">Assigned Role</label>
                                <select class="form-control" name="assigned_role" id="assigned_role">
                                    <option value="">Choose...</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('assigned_role')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}" name="user_id">
                            <input class="btn btn-warning" type="submit" value="Assign Role">
                        </form>

                    </div>

                    <!--User Permission -->
                    <div class="col m-3">
                        <h5>Permissions</h5>
                        <hr>

                        @foreach($user_permissions as $user_permission)
                        <div class="alert alert-info w-75 mx-5"> {{$user_permission->name}}
                            <a href="/user/{{$user->id}}/revoke_permission/{{$user_permission->id}}"
                                style="float:right">
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
                            </a>
                        </div>
                        @endforeach
                        <hr>

                        <form action="/user/assign_permission" method="post">
                            @csrf
                            <div class="my-3">
                                <label for="assign_permission" class="form-label">Assigned Permission</label>
                                <select class="form-control" name="assign_permission" id="assign_permission">
                                    <option value="">Choose...</option>
                                    @foreach($permissions as $permission)
                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                                @error('assign_permission')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="user_id" value="{{$user->id}}" name="user_id">
                            <input class="btn btn-warning" type="submit" value="Assign Permission">
                        </form>

                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<br>
<br>
@endsection