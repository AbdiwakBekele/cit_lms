@extends('layouts.adminLayout')

@section('title', 'Setting | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Change Password</h3>

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


            <!-- User Form -->
            <div class="m-3 p-3 ">

                <form action="/admin_update_password" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">

                    <!--  Old Password -->
                    <div class="mb-3 mt-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="old_password" id="old_password"
                            placeholder="Enter Your Old Password" required>
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--  New Password -->
                    <div class="mb-3 mt-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password"
                            placeholder="Enter Your New Password" required>
                        @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--  Confirm Password -->
                    <div class="mb-3 mt-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                            placeholder="Confirm Password" required>
                        @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <input type="submit" name="submit" class="btn btn-warning">
                </form>
            </div>
        </div>



    </div>
</div>

<br>
<br>
@endsection