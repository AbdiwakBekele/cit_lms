@extends('layouts.adminLayout')

@section('title', 'Feedbacks - CTI')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Feedback
                Management</h3>
        </div>
        <div class="container">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block m-3">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block m-3">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th style="color: #16416E;font-weight: bold;">Date</th>
                            <th style="color: #16416E;font-weight: bold;">Issues</th>
                            <th style="color: #16416E;font-weight: bold;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($feedbacks as $feedback)
                        <td>{{$feedback->created_at}}</td>
                        <td>Unable to access Advanced Digital Marketing</td>

                        <td>
                            <a href="/feedback/{{$feedback->id}}"><i class="fa fa-eye mx-1" style="font-size: 17px"
                                    aria-hidden="true"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{$feedback->id}}"><i
                                    class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                    aria-hidden="true"></i></a>

                            <!-- The Modal -->
                            <div class="modal" id="myModal{{$feedback->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal body -->
                                        <div class="modal-body my-4 text-center h5">
                                            Are you sure?
                                            <hr>
                                            <form action="/feedback/{{$feedback->id}}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <label for="password">Confirm your password
                                                    <span class="text-danger">*</span> </label>
                                                <input type="password" class="form-control mx-2 my-3" name="password"
                                                    id="password" placeholder="password" required>

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
@endsection