@extends('layouts.adminLayout')

@section('title', 'Scholarships - CTI')

@section('content')

<div id="wrapper">
    <div class="text-primary bg-primary"
        style="width: 40px;background: #D9D9D9;--bs-primary: #D9D9D9;--bs-primary-rgb: 217,217,217;"></div>

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid">
                <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Scholarship
                    Applicants</h3>
            </div>

            <div class="container">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="color: #16416E;font-weight: bold;">No</th>
                                <th style="color: #16416E;font-weight: bold;">Applicant Name</th>
                                <th style="color: #16416E;font-weight: bold;">Email</th>
                                <th style="color: #16416E;font-weight: bold;">Phone</th>
                                <th style="color: #16416E;font-weight: bold;">Status</th>
                                <th style="color: #16416E;font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($scholarships as $index => $scholarship)
                            <tr>
                                <td>{{++$index}}</td>
                                <td> {{$scholarship->fullname}} </td>
                                <td> {{$scholarship->email}} </td>
                                <td> {{$scholarship->phone}}</td>
                                @if(!empty($scholarship->status))
                                <td>{{$scholarship->status}}</td>
                                @else
                                <td class="text-secondary"> Not Reviewed </td>
                                @endif

                                <td>
                                    <a href="/scholarship/{{$scholarship->id}}"><i class="fa fa-eye mx-1"
                                            style="font-size: 17px" aria-hidden="true"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal{{$scholarship->id}}"><i
                                            class="fa fa-trash text-danger mx-1" style="font-size: 17px"
                                            aria-hidden="true"></i></a>


                                    <!-- The Modal -->
                                    <div class="modal" id="myModal{{$scholarship->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal body -->
                                                <div class="modal-body my-4 text-center h5">
                                                    Are you sure?
                                                    <hr>
                                                    <form action="/scholarship/{{$scholarship->id}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <label for="password">Confirm your password
                                                            <span class="text-danger">*</span> </label>
                                                        <input type="password" class="form-control mx-2 my-3"
                                                            name="password" id="password" required>

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