@extends('layouts.adminLayout')

@section('title', 'Role | User - CTI')

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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="color: #16416E;font-weight: bold;">Role Name</th>
                                <th style="color: #16416E;font-weight: bold;">Detail</th>
                                <th style="color: #16416E;font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->role_detail}}</td>
                                <td>

                                    <a href="/role/{{$role->id}}/edit"><i class="fa fa-pencil mx-1"
                                            style="font-size: 17px" aria-hidden="true"></i></a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>

                <h3>Permissions</h3>
                @if($role->permissions->count() > 0)
                @foreach($role->permissions as $permission)

                <div class="alert alert-info w-50 mx-5"> {{$permission->name}}
                    <a href="/role/{{$role->id}}/revoke_permission/{{$permission->id}}" style="float:right">
                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                    </a>

                </div>

                @endforeach

                @else
                <div class="alert alert-danger w-50 mx-5"> No Permission</div>

                @endif

                <hr class="m-4">

                <h3>Assign Permission</h3>
                <form action="/role/{{$role->id}}/permission" method="post">
                    @csrf

                    <!-- Assigned Role -->
                    <div class="my-3">
                        <label for="assign_permission" class="form-label">Assigned Permission</label>
                        <select class="form-control" name="assign_permission" id="assign_permission">
                            <option value="">Choose...</option>
                            @foreach($permissions as $permission)
                            <option value="{{$permission->name}}">{{$permission->name}}</option>
                            @endforeach
                        </select>
                        @error('assigned_role')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <input class="btn btn-warning" type="submit" value="Assign Permission">
                </form>

            </div>


        </div>


    </div>
</div>
@endsection