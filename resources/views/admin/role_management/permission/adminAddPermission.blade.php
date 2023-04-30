@extends('layouts.adminLayout')

@section('title', 'Permission | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Add New Permission</h3>

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

                <form action="/permission" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="POST">
                    <!--  Role name -->
                    <div class="mb-3 mt-3">
                        <label for="permission_name" class="form-label">Permission Name</label>
                        <input type="text" class="form-control" name="permission_name" id="permission_name"
                            placeholder="Enter permission name" required>
                        @error('permission_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="permission_detail" class="form-label">Permission Detail</label>
                        <textarea class="form-control" name="permission_detail" id="permission_detail" cols="30"
                            rows="10" required></textarea>
                        @error('permission_detail')
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