@extends('layouts.adminLayout')

@section('title', 'Profile | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Profile</h3>

            <!-- User Form -->
            <div class="m-3 p-3 ">

                <a class="btn btn-warning m-4" href="/user/{{$user->id}}/edit"> Edit Info </a>

                <!-- User Info -->
                <div class="row alert alert-primary ">
                    <div class="col-lg">
                        <!-- Profile Image -->
                        @if($user->profile_img)
                        <img class="img-fluid" src=" {{ asset('user_profile/'.$user->profile_img) }} ">

                        @else
                        <img class="img-fluid" src=" {{ asset('images/AM2A1021.JPG') }} ">
                        @endif

                        <a class="btn btn-light m-1" href="#">Change Profile</a>

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