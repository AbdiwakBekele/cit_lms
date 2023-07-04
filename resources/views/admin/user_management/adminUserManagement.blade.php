@extends('layouts.adminLayout')

@section('title', 'User - CTI')

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
            <!-- Users part -->
            <div class="col-lg m-4">
                <a class="btn btn-primary m-3" role="button"
                    style="color: #16416E;background: #ffb600;font-weight: bold;height: 32px;font-size: 14px;border-style: none;"
                    href="user/create">Add New User</a>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="color: #16416E;font-weight: bold;">ID</th>
                                <th style="color: #16416E;font-weight: bold;">User Name</th>
                                <th style="color: #16416E;font-weight: bold;">Email</th>
                                <th style="color: #16416E;font-weight: bold;">Role</th>
                                <th style="color: #16416E;font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($users as $user)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->email }}</td>

                                @php
                                $roles = $user->getRoleNames();
                                @endphp
                                <td>
                                    @foreach($roles as $role)
                                    {{ $role }} |
                                    @endforeach
                                </td>

                                <td>
                                    <a href="/user/{{$user->id}}"><i class="fa fa-eye mx-1" style="font-size: 17px"
                                            aria-hidden="true"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{$user->id}}"><i
                                            class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                            aria-hidden="true"></i></a>

                                    <!-- The Modal -->
                                    <div class="modal" id="myModal{{$user->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal body -->
                                                <div class="modal-body my-4 text-center h5">
                                                    Are you sure?
                                                    <hr>
                                                    <form action="/user/{{$user->id}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <label for="password">Confirm your password
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="password" class="form-control mx-2 my-3"
                                                            name="password" id="password" placeholder="password"
                                                            required>

                                                        <input type="submit" class="btn btn-danger" value="Delete">

                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </div>
</div>
@endsection