@extends('layouts.adminLayout')

@section('title', 'Role | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Edit Role Information</h3>

            <!-- User Form -->
            <div class="m-3 p-3 ">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <form action="/role/{{$role->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <!--  Role name -->
                    <div class="mb-3 mt-3">
                        <label for="role_name" class="form-label">Role Name</label>
                        <input type="text" class="form-control" name="role_name" id="role_name"
                            placeholder="Enter role name" value="{{$role->name}}" required>
                        @error('role_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="role_detail" class="form-label">Role Detail</label>
                        <textarea class="form-control" name="role_detail" id="role_detail" cols="30" rows="10"
                            required>{{$role->role_detail}}</textarea>
                        @error('role_detail')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <input type="submit" name="submit" class="btn btn-warning ">
                </form>
            </div>



        </div>



    </div>
</div>
@endsection