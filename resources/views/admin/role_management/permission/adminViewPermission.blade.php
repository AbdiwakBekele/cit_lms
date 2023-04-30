@extends('layouts.adminLayout')

@section('title', 'Permission | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Permission | User Management</h3>

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
            <!-- Permission Part -->
            <div class="col-lg mx-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="color: #16416E;font-weight: bold;">Permission Name</th>
                                <th style="color: #16416E;font-weight: bold;">Detail</th>
                                <th style="color: #16416E;font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->permission_detail}}</td>
                                <td>

                                    <a href="/permission/{{$permission->id}}/edit"><i class="fa fa-pencil mx-1"
                                            style="font-size: 17px" aria-hidden="true"></i></a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>

                <h3>Roles with the access</h3>
                @if($permission->roles->count() > 0)
                @foreach($permission->roles as $role)

                <div class="alert alert-info w-50 mx-5"> {{$role->name}}
                    <a href="/permission/{{$permission->id}}/revoke_permission/{{$role->id}}" style="float:right">
                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                    </a>
                </div>

                @endforeach

                @else
                <div class="alert alert-danger w-50 mx-5"> No Roles</div>

                @endif

                <hr class="m-4">

                <h3>Assign Roles</h3>
                <form action="/permission/{{$permission->id}}/role" method="post">
                    @csrf

                    <!-- Assigned Role -->
                    <div class="my-3">
                        <label for="assign_role" class="form-label">Assigned Role</label>
                        <select class="form-control" name="assign_role" id="assign_role">
                            <option value="">Choose...</option>
                            @foreach($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('assigned_role')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <input class="btn btn-warning" type="submit" value="Assign Role">
                </form>

            </div>


        </div>


    </div>
</div>
@endsection