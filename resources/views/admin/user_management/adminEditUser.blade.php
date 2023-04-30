@extends('layouts.adminLayout')

@section('title', 'Role | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Edit User</h3>

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

                <form action="/user/{{$user->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">

                    <!--  Fullname -->
                    <div class="mb-3 mt-3">
                        <label for="fullname" class="form-label">User Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="fullname"
                            placeholder="Enter User's Fullname" value="{{$user->fullname}}" required>
                        @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address"
                            name="email" value="{{$user->email}}" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Age -->
                    <div class="mb-3 mt-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="Enter Age" name="age"
                            value="{{$user->age}}" required>
                        @error('age')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter Phone number" name="phone"
                            value="{{$user->phone}}" required>
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address"
                            value="{{$user->address}}" required>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Assigned Role -->
                    <div class="mb-3 mt-3">
                        <label for="assigned_role" class="form-label">Assigned Role</label>
                        <select class="form-control" name="assigned_role" id="assigned_role">
                            <option value=""> Choose... </option>
                            <?php 
                                            foreach($roles as $role){
                                            $selected = ($role->id == $user->role_id) ? "selected" : "";
                                                echo "<option value='".$role->id."'". $selected."  >".$role->role_name."</option>";
                                            }   
                                        ?>
                        </select>
                        @error('assigned_role')
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
@endsection