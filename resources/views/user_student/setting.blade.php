@extends('layouts.studentLayout')

@section('title', 'Setting | CTI')

@section('content')

<!-- heading banner -->
<section class="heading-banner text-white " style="background:#16416E">
    <div class="container holder">
        <div class="align">
        </div>
    </div>
</section>
<!-- breadcrumb nav -->
<nav class="breadcrumb-nav">
    <div class="container">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Setting</li>
        </ol>
    </div>
</nav>
<!-- two columns -->
<div id="" class="container">
    @if(session()->has('error'))
    <div class="alert alert-danger"> {{ session('error') }} </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success"> {{ session('success') }} </div>
    @endif


    <!-- Setting Options -->
    <div class="m-3 p-3 ">

        <div class="alert alert-light">
            <a href="/change_password" style="color:black"> Security | Change Password </a>
        </div>


    </div>

</div>

@endsection