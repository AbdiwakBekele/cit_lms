<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz Result</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">Quiz Result
                    </h3>
                </div>
                <div class="container">

                    <!-- Batch Information -->
                    <div class="alert alert-primary">
                        <div class="row">

                            <div class="col-md">
                                <p><strong> Batch ID:</strong> BT/{{$classroom->batch->id}}/23</p>
                            </div>

                            <div class="col-md">
                                <p> <strong>Course:</strong> {{$classroom->course->course_name}}</p>
                            </div>

                            <div class="col-md">
                                <p><strong> Course Content:</strong> {{$content->content_name}}</p>
                            </div>
                        </div>
                    </div>


                    <hr>
                    <h4> Answers</h4>

                    @foreach($answers as $answer)
                    @php
                    $quiz= $answer->quiz;
                    @endphp
                    <div class="alert alert-light">
                        <p> Question: <strong>{!!$quiz->question!!}</strong> </p>

                        @if($quiz->type == 1)
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    @foreach($quiz->quiz_options as $quiz_option)

                                    @if($quiz_option->option == $answer->answer)
                                    <div
                                        class="col mx-1 alert {{($quiz->answer == $answer->answer) ? 'alert-success' : 'alert-danger'}}">
                                        {{$quiz_option->option}}
                                    </div>
                                    @else
                                    <div
                                        class="col mx-1 alert {{($quiz->answer == $quiz_option->option) ? 'alert-success' : ''}} ">
                                        {{$quiz_option->option}}
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-2">
                                <strong class="text-primary">
                                    <p>Score: {{($quiz->answer == $answer->answer) ? $quiz->points : 0 }} /
                                        {{$quiz->points}}
                                    </p>
                                </strong>
                            </div>

                        </div>

                        @elseif($quiz->type == 2)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-primary"> {{$answer->answer}}</div>
                            </div>
                            <div class="col-2">
                                <strong class="text-primary">
                                    <p>Score out of {{$quiz->points}}</p>
                                </strong>
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
                                    $isMatched = $answer->matchAnswers->contains(function ($matchAnswer) use
                                    ($match_row,
                                    $match_column) {
                                    return $matchAnswer->match_row_id === $match_row->id &&
                                    $matchAnswer->match_column_id
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
                            <div class="col-2 ">
                                <strong class="text-primary">
                                    <p>Score out of {{$quiz->points}}</p>
                                </strong>
                            </div>
                        </div>
                        @endif

                    </div>
                    @endforeach

                    <br>
                    <br>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>

</html>