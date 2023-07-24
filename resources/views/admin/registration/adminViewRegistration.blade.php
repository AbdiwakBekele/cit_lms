@extends('layouts.adminLayout')

@section('title', 'Registration - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Registration</h3>
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

            <div class="m-4">
                <a href="/registration/create" class="btn btn-warning mx-2"> Add New
                    Registration</a>
            </div>


        </div>
    </div>
</div>


@endsection