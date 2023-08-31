@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('styles')
<style>
#editor {
    border: 1px solid #ccc;
    padding: 5px;
    min-height: 200px;
    color: black;
}


#editor ul {
    list-style-type: none;
    margin-left: 20px;
}

#editor li:before {
    content: "\2022";
    margin-right: 5px;
}

table {
    border-collapse: collapse;
    margin-bottom: 10px;
}

th,
td {
    border: 1px solid black;
    padding: 15px;
}

th {
    background-color: #f2f2f2;
}

.table-size-input {
    width: 50px;
}
</style>

@endsection

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
                    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

                    <div class="my-3 bg-white px-3 py-1 rounded">
                        <div class="m-3">
                            <button type="button" class='btn btn-light m-1' onclick="execCmd('bold')"><b>B</b></button>
                            <button type="button" class='btn btn-light m-1'
                                onclick="execCmd('italic')"><i>I</i></button>
                            <button type="button" class='btn btn-light m-1'
                                onclick="execCmd('underline')"><u>U</u></button>
                            <button type="button" class='btn btn-light m-1'
                                onclick="execCmd('insertUnorderedList')"><b>&#8226;</b></button>

                            <button type="button" class='btn btn-light m-1' onclick="insertTable()">Insert
                                Table</button>

                            <button type="button" class='btn btn-light m-1' onclick="execCmd('justifyLeft')"><b><i
                                        class="fa fa-align-left" aria-hidden="true"></i></b></button>
                            <button type="button" class='btn btn-light m-1' onclick="execCmd('justifyCenter')"><b><i
                                        class="fa fa-align-center" aria-hidden="true"></i></b></button>
                            <button type="button" class='btn btn-light m-1' onclick="execCmd('justifyRight')"><b><i
                                        class="fa fa-align-right" aria-hidden="true"></i></b></button>
                            <button type="button" class='btn btn-light m-1' onclick="execCmd('justifyFull')"><b><i
                                        class="fa fa-align-justify" aria-hidden="true"></i></b></button>

                            <select class="p-1 m-1" onchange="execCmd('formatBlock', this.value)">
                                <option value="p">Normal</option>
                                <option value="H1">Header 1</option>
                                <option value="H2">Header 2</option>

                            </select>

                            <select class="p-1 m-1" onchange="execCmd('fontSize', this.value)">
                                <option value="1">8</option>
                                <option value="2">10</option>
                                <option value="3" selected>12</option>
                                <option value="4">14</option>
                                <option value="5">16</option>
                                <option value="6">18</option>
                                <option value="7">20</option>
                            </select>

                        </div>
                        <input type="hidden" name="question" id="question">
                        <div class="mx-3" id="editor" contenteditable="true"></div>


                        @error('question')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                <input type="submit" class="btn btn-warning">
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



function execCmd(command, arg = null) {
    if (arg) {
        document.execCommand(command, false, arg);
    } else {
        document.execCommand(command, false, null);
    }
}

function insertTable() {
    var rows = prompt("Enter number of rows", "2");
    var cols = prompt("Enter number of columns", "2");
    var table = "<table style='border: 1px solid black'>";
    for (var i = 0; i < rows; i++) {
        table += "<tr>";
        for (var j = 0; j < cols; j++) {
            table += "<td></td>";
        }
        table += "</tr>";
    }
    table += "</table>";
    // execCmd('insertHTML', table);
    document.getElementById('editor').insertAdjacentHTML('beforeend', table);
}

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    var editor = document.getElementById('editor');
    var content = editor.innerHTML;
    document.getElementById('question').value = content;
    this.submit();
});
</script>
@endsection