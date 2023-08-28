@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Add Content Quiz Question - Matching</h3>
            <!-- Breadcrumb - Nav -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/course">Course Management</a></li>
                        <li class="breadcrumb-item"><a href="/course/{{$course->id}}">Course Contents</a></li>
                        <li class="breadcrumb-item"><a href="#">Add Quiz</a></li>
                    </ol>
                </div>
            </nav>

        </div>
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

        <!-- answer_rows Error -->
        @error('answer_rows')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Option Loop Error -->
        @if ($errors->has('answer_rows.*'))
        @foreach($errors->get('answer_rows.*') as $error)
        <div class="alert alert-danger mx-5">{{ $error[0] }}</div>
        <br>
        @endforeach
        @endif

        <!-- answer_column Error -->
        @error('answer_columns')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Option Loop Error -->
        @if ($errors->has('answer_columns.*'))
        @foreach($errors->get('answer_columns.*') as $error)
        <div class="alert alert-danger mx-5">{{ $error[0] }}</div>
        <br>
        @endforeach
        @endif

        <div class="container">
            <form action="/quiz_match" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">

                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="content_id" value="{{$content->id}}">

                <!-- Question -->
                <div class="mb-3 mt-3">
                    <label class="form-label" for="points"> Points </label>
                    <input class="form-control w-25" type="number" name="points" id="points" value="1" min="1">
                    <label for="question" class="form-label"> <strong>Title</strong> </label>
                    <textarea class="form-control" name="question" id="question" cols="30" rows="5" required></textarea>
                    @error('question')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <!-- Row Options -->
                    <div class="col">
                        <table>
                            <tbody id="answer_row">
                                <tr>
                                    <td>
                                        <label class="form-label">
                                            <strong>Row 1</strong>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="m-3">
                                            <textarea class="form-control" name="answer_rows[]" cols="40" rows="2"
                                                required></textarea>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-light m-2" onclick=" addRow()">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Row
                        </button>

                    </div>

                    <!-- Column Options -->
                    <div class="col">
                        <table>
                            <tbody id="answer_column">
                                <tr>
                                    <td>
                                        <label class="form-label">
                                            <strong>Column 1</strong>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="m-3">
                                            <textarea class="form-control" name="answer_columns[]" cols="40" rows="2"
                                                required></textarea>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-light m-2" onclick=" addColumn()">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Column
                        </button>
                    </div>

                </div>
                <!-- Submit Button -->
                <input type="submit" name="submit" class="btn btn-warning">
            </form>

            <br>
            <br>


        </div>
    </div>
</div>


<script>
var rowIndex = 2;
var colIndex = 2;

function addRow() {
    var table = document.getElementById('answer_row');
    var newRow = table.insertRow();
    var labelCell = newRow.insertCell(0);
    var optionCell = newRow.insertCell(1);

    labelCell.innerHTML = '<label class="form-label"><strong> Row ' + rowIndex + '</strong></label>';
    optionCell.innerHTML =
        '<div class="m-3"><textarea class="form-control" name="answer_rows[]" cols="40" rows="2" required></textarea></div>';
    rowIndex++;
}

function addColumn() {
    var table = document.getElementById('answer_column');
    var newRow = table.insertRow();
    var labelCell = newRow.insertCell(0);
    var optionCell = newRow.insertCell(1);

    labelCell.innerHTML = ' <label class="form-label"><strong> Column ' + colIndex + '</strong></label>';
    optionCell.innerHTML =
        '<div class="m-3"><textarea class="form-control" name="answer_columns[]" cols="40" rows="2" required></textarea></div>';
    colIndex++;
}
</script>
@endsection