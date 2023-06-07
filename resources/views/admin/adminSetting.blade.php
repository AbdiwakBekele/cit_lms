@extends('layouts.adminLayout')

@section('title', 'Setting | User - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Setting</h3>

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

            <!-- Setting Options -->
            <div class="m-3 p-3 ">

                <div class="alert alert-light">
                    <a href="/admin_edit_password"> Security | Change Password </a>
                </div>


            </div>
        </div>



    </div>
</div>

<br>
<br>
@endsection