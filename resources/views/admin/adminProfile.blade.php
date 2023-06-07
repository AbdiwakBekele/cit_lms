@extends('layouts.adminLayout')

@section('title', 'Profile | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Profile</h3>

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

            @error('profile_img')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- User Form -->
            <div class="m-3 p-3 ">

                <a class="btn btn-warning m-4" href="/admin_profile/{{$user->id}}/edit"> Edit Info </a>

                <!-- User Info -->
                <div class="row alert alert-primary ">
                    <div class="col-lg">
                        <!-- Profile Image -->
                        @if($user->profile_img)
                        <img class="img-fluid" src=" {{ asset('user_profile/'.$user->profile_img) }} ">

                        @else
                        <img class="img-fluid" src=" {{ asset('images/AM2A1021.JPG') }} ">
                        @endif


                        <!-- Delete Section -->
                        <a href="#" data-bs-toggle="modal" class="btn btn-light m-1"
                            data-bs-target="#myModalProfile">Change Profile</a>

                        <!-- Modal | Deleting Section -->
                        <div class="modal" id="myModalProfile">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal body -->
                                    <div class="modal-body my-4 text-center h5">
                                        Upload Profile

                                        <form action="/admin_profile_upload/{{$user->id}}" method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="file" class="form-control m-3" id="profile_img"
                                                name="profile_img" required>

                                            <input type="submit" class="btn btn-primary" value="Upload">

                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">


                                    </div>

                                </div>
                            </div>
                        </div>

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

            </div>
        </div>



    </div>
</div>

<br>
<br>
@endsection