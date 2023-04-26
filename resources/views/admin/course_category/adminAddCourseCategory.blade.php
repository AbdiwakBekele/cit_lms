@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Add New
                Course Category</h3>
        </div>
        <div class="container">
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

            <form action="/courseCategory" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="POST">

                <div class=" mb-3 mt-3">
                    <label class="form-label">Course Category Name</label>
                    <input class="form-control" type="text" name="category_name"
                        placeholder="Enter Course Category Name" required>
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="my-3">

                    <label class="form-label">Course Category Description</label>
                    <textarea class="form-control" name="category_detail"
                        placeholder="Enter Course Category Description" rows="5" required></textarea>
                    @error('category_detail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <input type="submit" value="submit" class="btn btn-warning">

            </form>
        </div>

    </div>
</div>
@endsection