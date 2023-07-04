@extends('layouts.adminLayout')

@section('title', 'Courses - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Add Section Quiz Question</h3>
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

        @error('answer')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <!-- Option Error -->
        @error('options')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Option Loop Error -->
        @if ($errors->has('options.*'))
        @foreach($errors->get('options.*') as $error)
        <div class="alert alert-danger mx-5">{{ $error[0] }}</div>
        <br>
        @endforeach
        @endif

        <div class="container">

            <form action="/quiz/{{$quiz->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <!-- Question -->
                <div class="mb-3 mt-3">
                    <label for="question" class="form-label"> <strong>Question</strong> </label>
                    <textarea class="form-control" name="question" id="question" cols="30" rows="5"
                        required>{{$quiz->question}}</textarea>
                    @error('question')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <span style="font-style: italic" class="text-secondary h6"> <span class="text-danger">*</span> Check the
                    correct
                    answer as well</span>

                <table>
                    <tbody id="answer_fields">
                        @foreach($quiz->quiz_options as $index => $option)
                        <tr>
                            <td>
                                <input type="radio" name="answer" value="{{$index + 1}}"
                                    {{$quiz->answer == $option->option ? 'checked' : ''}} required>
                                <label class="form-label">
                                    <strong>Option {{$index + 1}}</strong>
                                </label>
                            </td>
                            <td>
                                <div class="m-3">
                                    <textarea class="form-control" name="options[]" cols="50" rows="3"
                                        required>{{$option->option}}</textarea>
                                </div>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>

                <!-- Submit Button -->
                <button type="button" class="btn btn-light m-2" onclick=" addRow()">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Options
                </button>
                <br>
                <input type="submit" name="submit" class="btn btn-warning">
            </form>

            <br>
            <br>


        </div>
    </div>
</div>

<?php 
    $x = $quiz->quiz_options->count() + 1;
?>

<script>
var index = <?php echo $x; ?>


function addRow() {

    var table = document.getElementById('answer_fields');
    var newRow = table.insertRow();
    var labelCell = newRow.insertCell(0);
    var optionCell = newRow.insertCell(1);

    labelCell.innerHTML = ' <input type="radio" name="answer" value="' + index +
        '" required > <label for="answer_1" class="form-label"><strong> Option ' + index + '</strong></label>';
    optionCell.innerHTML =
        '<div class="m-3"><textarea class="form-control" name="options[]" cols="50" rows="3" required></textarea></div>';
    index++;
}
</script>
@endsection