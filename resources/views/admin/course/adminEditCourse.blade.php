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
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Edit Courses</h3>
        </div>
        <div class="m-3">

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

            <form action="/course/{{$course->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <!-- Course Fullname -->
                <div class="mb-3 mt-3">
                    <label for="course_name" class="form-label">Course Fullname</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="course_name" placeholder="Enter Course Fullname"
                        name="course_name" value="{{$course->course_name}}" required>
                    @error('course_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course shortname -->
                <div class="mb-3 mt-3">
                    <label for="short_name" class="form-label">Course Short name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="short_name" placeholder="Enter Course Fullname"
                        name="short_name" value="{{$course->short_name}}" required>
                    @error('short_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Category -->
                <div class="mb-3 mt-3">
                    <label for="course_category" class="form-label">Course Category</label>
                    <span class="text-danger">*</span>
                    <select class="form-control" name="course_category" id="course_category" required>
                        <option value=""> Choose... </option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            {{ $course->course_category_id == $category->id ? 'selected' : ''}}>
                            {{$category->category_name}}
                        </option>
                        @endforeach

                    </select>
                    @error('course_category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Duration -->
                <div class="mb-3 mt-3">
                    <label for="course_duration" class="form-label">Course Duration(Weeks)</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="course_duration"
                        placeholder="Enter course duration in weeks" min="0" name="course_duration"
                        value="{{$course->course_duration}}" required>
                    @error('course_duration')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Price -->
                <div class="mb-3 mt-3">
                    <label for="course_price" class="form-label">Course Price (ETB)</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="course_price" placeholder="Enter course price in ETB"
                        min="0" name="course_price" value="{{$course->course_price}}" required>
                    @error('course_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Course Teaching Process -->
                <div class="mb-3 mt-3">
                    <label for="teaching_process" class="form-label">Course Teaching Process</label>

                    <select class="form-control" name="teaching_process" id="teaching_process" required>
                        <option value=""> Choose... </option>
                        <option value="1">Based on student's own pace</option>
                        <option value="1">Based on given timeline</option>
                        <option value="1" selected>Based on progress score</option>
                    </select>
                </div>

                <!-- Assigned Teacher Coordinator -->
                <div class="mb-3 mt-3">
                    <label for="assigned_coordinator" class="form-label">Assigned Coordinator
                        (Optional)</label>

                    <select class="form-control" name="assigned_coordinator" id="assigned_coordinator">
                        <option value=""> Choose... </option>
                        @foreach($coordinators as $coordinator)
                        <option value="{{$coordinator->id}}"
                            {{$course->user_id == $coordinator->id ? 'seleceted' : ''}}> {{$coordinator->fullname}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Course Description -->
                <div class="my-3 bg-white px-3 py-1 rounded">
                    <label for="description" class="form-label">Course Description</label>
                    <span class="text-danger">*</span>

                    <div class="m-3">
                        <button type="button" class='btn btn-light m-1' onclick="execCmd('bold')"><b>B</b></button>
                        <button type="button" class='btn btn-light m-1' onclick="execCmd('italic')"><i>I</i></button>
                        <button type="button" class='btn btn-light m-1' onclick="execCmd('underline')"><u>U</u></button>
                        <button type="button" class='btn btn-light m-1'
                            onclick="execCmd('insertUnorderedList')"><b>&#8226;</b></button>

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

                    <input type="hidden" name="description" id="description">
                    <div class="mx-3" id="editor" contenteditable="true"> {!! $course->description !!} </div>


                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <input type="submit" class="btn btn-warning btn-lg">
            </form>
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

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    var editor = document.getElementById('editor');
    var content = editor.innerHTML;
    document.getElementById('description').value = content;
    this.submit();
});
</script>

@endsection