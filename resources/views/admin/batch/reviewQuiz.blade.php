@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">List of
                Current Batches</h3>
        </div>
        <div class="container">

            <!-- Batch Information -->
            <div class="alert alert-primary">
                <div class="row">

                    <div class="col-md">
                        <p><strong> Batch ID:</strong> BT/{{$classroom->batch->id}}/23</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch Name:</strong> {{$classroom->batch->batch_name}}</p>
                    </div>

                    <div class="col-md">
                        <p><strong> Batch shift:</strong> {{$classroom->batch->shift}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <p> <strong>Course:</strong> {{$classroom->course->course_name}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>Start date:</strong> {{$classroom->batch->starting_date}}</p>
                    </div>
                    <div class="col-md">
                        <p> <strong>End date:</strong> {{$classroom->batch->ending_date}}</p>
                    </div>
                </div>
            </div>

            <!-- Student Status -->
            <h4>Student Status</h4>
            <div class="alert alert-primary m-1 row">

                <div class="col-md">
                    <p><strong> Student ID:</strong> CTI/{{$classroom->student->id}}/23</p>
                </div>

                <div class="col-md">
                    <p><strong> Student Name:</strong> {{$classroom->student->fullname}}</p>
                </div>

                <div class="col-md">
                    <p><strong> Enrolled Date:</strong> {{$classroom->created_at}}</p>
                </div>
            </div>

            <hr>
            <h4> Review Content Exam </h4>

            <form action="/submit_quiz_result/{{$classroom->id}}/{{$content_id}}" method="post">
                @csrf

                @foreach($answers as $answer)
                @php
                $quiz= $answer->quiz;
                @endphp
                <div class="alert alert-light">
                    <p> Question: {!!$quiz->question!!} </p>

                    @if($quiz->type == 1)
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                @foreach($quiz->quiz_options as $quiz_option)

                                @if($quiz_option->option == $answer->answer)
                                <div class="col alert alert-primary">
                                    {{$quiz_option->option}}
                                </div>
                                @else
                                <div class="col ">
                                    {{$quiz_option->option}}
                                </div>
                                @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="col-2 border border-secondary rounded">
                            <strong class="text-dark">
                                <p>Score</p>
                            </strong>
                            <input type="number" style="width:50%" name="points[]" min="0"
                                value="{{($quiz->answer == $answer->answer) ? $quiz->points : 0 }}" required> /
                            {{$quiz->points}}
                        </div>

                    </div>

                    @elseif($quiz->type == 2)
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-primary"> {{$answer->answer}}</div>
                        </div>
                        <div class="col-2 border border-secondary rounded">
                            <strong class="text-dark">
                                <p>Score</p>
                            </strong>
                            <input type="number" style="width:50%" name="points[]" min="0" required> / {{$quiz->points}}
                        </div>


                    </div>

                    @elseif($quiz->type == 3)
                    <div class="row">
                        <div class="col ">
                            <!-- Displaying Column Datas -->
                            <div class="row">
                                <div class="col"></div>
                                @foreach($quiz->match_columns as $match_column)
                                <div class="col">{{ $match_column->column_content }}</div>
                                @endforeach
                            </div>

                            <!-- Displaying Rows -->
                            @foreach($quiz->match_rows as $match_row)
                            <div class="row">
                                <!-- Displaying Row Data -->
                                <div class="col">{{ $match_row->row_content }}</div>

                                <!-- Generating Cells -->
                                @foreach($quiz->match_columns as $match_column)
                                @php
                                $isMatched = $answer->matchAnswers->contains(function ($matchAnswer) use ($match_row,
                                $match_column) {
                                return $matchAnswer->match_row_id === $match_row->id && $matchAnswer->match_column_id
                                ===
                                $match_column->id;
                                });
                                @endphp
                                <div
                                    class="col{{ $isMatched ? ' alert alert-primary mx-3' : ' alert alert-light mx-3' }}">
                                    @if($isMatched)
                                    <i class="fa fa-check text-primary" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    @endif
                                </div>
                                @endforeach
                                <hr>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-2 border border-secondary rounded">
                            <strong class="text-dark">
                                <p>Score</p>
                            </strong>
                            <input type="number" style="width:50%" name="points[]" min="0" required> / {{$quiz->points}}
                        </div>
                    </div>
                    @endif

                </div>
                @endforeach

                <hr>

                <button type="submit" class="btn btn-primary m-3"> Submit Result </button>

            </form>

            <br>
            <br>

        </div>
    </div>
</div>
@endsection