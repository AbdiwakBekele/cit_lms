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
                Add Section Quiz Question (Short Answer)</h3>

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


        <div class="container">

            <form action="/quiz_short" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">

                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="content_id" value="{{$content->id}}">

                <!-- Question -->
                <div class="mb-3 mt-3">
                    <label class="form-label" for="points"> Points </label>
                    <input class="form-control w-25" type="number" name="points" id="points" value="1" min="1">
                    <label for="question" class="form-label"> <strong>Question</strong> </label>
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

                <br>
                <input type="submit" class="btn btn-warning">
            </form>

            <br>
            <br>


        </div>
    </div>
</div>

<script>
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