<!DOCTYPE html>
<html lang="en">


    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

        <title>Quiz</title>

        <style>
        body {
            background: linear-gradient(to right, #FFB600, #16416E);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            position: relative;
        }

        .logo {
            position: fixed;
            top: 20px;
            left: 20px;
            height: 50px;
            z-index: 1;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #16416E;
        }

        .question {
            margin-bottom: 20px;
            background-color: #fff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #16416E;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        input[type="radio"] {
            margin-right: 10px;
            margin-top: 3px;
            display: none;
        }

        .form-check-label {
            font-size: 18px;
            font-weight: 400;
            margin-left: 10px;
            padding-left: 5px;
            padding-bottom: 5px;
            position: relative;
        }

        .form-check-label::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-left: -30px;
            margin-right: 10px;
            border: 2px solid #16416E;
            border-radius: 50%;
            background-color: white;
            position: absolute;
            left: 0;
            top: 2px;
        }

        .form-check-input:checked+.form-check-label::before {
            border-color: #16416E;
            background-color: #16416E;
        }

        .form-check-input:focus+.form-check-label::before {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        </style>
    </head>

    <body>
        <img src="{{ asset( 'images/Asset 3@300x.png') }}" alt="Logo" class="logo">

        <div class="container">
            <div id="warning_msg"></div>

            <div class="row justify-content-center">
                <!-- Completed Message Display -->
                <div class="text-center" id="msg">
                    <img src=" {{ asset('images/checkmark.png') }}" width="100px" alt="image_not_found">
                    <h4 class="text-center">
                        Quiz Successfully Completed
                </div>

                <div id="questions">
                    <input type="hidden" id="classroom_id" value="{{$classroom_id}}">
                    <input type="hidden" id="content_id" value="{{$content_id}}">

                    @foreach($questions as $question)
                    <div class="question" style="display:none;">
                        <div class="py-2 h5"><b>{{ $question->question }}</b></div>

                        <div class="card-body">
                            <!-- Question Type - Choose -->
                            @if($question->type == '1')

                            @foreach($question->quiz_options as $option)

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer_{{$question->id}}"
                                    value="{{ $option->option}}" id="{{ $option->id }}">
                                <label class="form-check-label" for="{{ $option->id }}">
                                    {{ $option->option}}
                                </label>
                            </div>
                            @endforeach

                            <!-- Question Type - Short Answer -->
                            @elseif($question->type == '2')
                            <textarea id="answer_{{$question->id}}" name="answer_{{$question->id}}" cols="30"
                                rows="10"></textarea>

                            <!-- Question Type - Matching -->
                            @elseif($question->type == '3')

                            <!-- Displaying Column Datas -->
                            <div class="row">
                                <div class="col"></div>
                                @foreach($question->match_columns as $match_column)
                                <div class="col"> {{$match_column->column_content}} </div>
                                @endforeach
                            </div>
                            <hr>

                            <form id="match_form">

                                @foreach($question->match_rows as $match_row)
                                <div class="row">
                                    <!-- Displaying Row Data -->
                                    <div class="col"> {{$match_row->row_content}} </div>

                                    <!-- Generating CheckBox -->
                                    @foreach($question->match_columns as $match_column)
                                    <div class="col">
                                        <input type="checkbox" data-row="{{ $match_row->id }}"
                                            data-column="{{ $match_column->id }}">
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                @endforeach

                            </form>

                            @endif
                        </div>

                        <button type="button" class="submitQuestion btn btn-primary float-end m-3"
                            data-question-id="{{ $question->id }}" data-question-type="{{ $question->type }}">Next
                            Question</button>


                    </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-success m-3" id="btn_submit" type="submit">Submit</button>
                </div>

            </div>
        </div>

        <script>
        // Finish Loading all the script
        document.addEventListener('DOMContentLoaded', function() {

            console.log("Loading Finishted");
            var classroomId = document.getElementById('classroom_id').value;
            var contentId = document.getElementById('content_id').value;
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            var questions = document.querySelectorAll('.question');
            var currentQuestion = 0;
            var submitClicked = false;

            // Last Submit Button - Initially Disabled
            var finalSubmitButton = document.getElementById('btn_submit');
            finalSubmitButton.style.display = 'none';
            document.getElementById('msg').style.display = 'none';

            // First Question Displayed
            questions[currentQuestion].style.display = 'block';

            const submitButtons = document.querySelectorAll('.submitQuestion');

            // Submit Button - Onclick Event
            submitButtons.forEach(submitButton => {
                submitButton.addEventListener('click', function() {
                    const questionId = submitButton.getAttribute('data-question-id');
                    const questionType = submitButton.getAttribute('data-question-type');
                    submitQuestion(questionId, questionType);
                });
            });

            finalSubmitButton.addEventListener('click', function() {
                submitClicked = true;
                submitQuiz();

            });

            // Submit Question - Next Quesiont
            function submitQuestion(questionId, questionType) {
                questions[currentQuestion].style.display = 'none';
                currentQuestion++;
                if (currentQuestion == questions.length) {
                    document.getElementById('msg').style.display = 'block';
                    finalSubmitButton.style.display = 'block';
                } else {
                    questions[currentQuestion].style.display = 'block';
                }

                var answer = "";
                if (questionType == 1) {
                    answer = document.querySelector('input[name=answer_' + questionId + ']:checked').value;
                    submitAnswer(classroomId, questionId, answer);
                } else if (questionType == 2) {
                    answer = document.getElementById("answer_" + questionId).value;
                    submitAnswer(classroomId, questionId, answer);
                } else if (questionType == 3) {
                    submitMatchAnswer(classroomId, questionId);
                }

            }

            // Submit Each Answer
            function submitAnswer(classroomId, questionId, answer) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/quiz_answer_submit/' + classroomId + '/' + questionId, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Handle the response from the server if necessary
                        var response = JSON.parse(xhr.responseText); // Parse the JSON response
                        console.log(response);
                    }
                };
                var data = 'classroomId=' + encodeURIComponent(classroomId) +
                    '&questionId=' + encodeURIComponent(questionId) +
                    '&answer=' + encodeURIComponent(answer);

                xhr.send(data);
            }

            // Submit Match Answer
            function submitMatchAnswer(classroomId, questionId) {

                var checkboxes = document.querySelectorAll('#match_form input[type="checkbox"]:checked');
                var matchAnswers = [];

                checkboxes.forEach(function(checkbox) {
                    var rowId = checkbox.getAttribute('data-row');
                    var columnId = checkbox.getAttribute('data-column');
                    matchAnswers.push({
                        row_id: rowId,
                        column_id: columnId
                    });
                });

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/quiz_match_submit/' + classroomId + '/' + questionId, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Handle the response from the server if necessary
                        var response = JSON.parse(xhr.responseText); // Parse the JSON response
                        console.log(response);
                    }
                };
                var requestBody = JSON.stringify({
                    match_answers: matchAnswers
                });

                xhr.send(requestBody);
            }

            // Submit Quiz - Finish
            function submitQuiz() {
                // Send an AJAX request to the server to disqualify the student
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/quiz_submit/' + classroomId + '/' + contentId, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Handle the response from the server if necessary
                        var response = JSON.parse(xhr.responseText); // Parse the JSON response
                        console.log(response);
                        window.close();
                    }
                };
                var data = 'classroomId=' + encodeURIComponent(classroomId) +
                    '&contentId=' + encodeURIComponent(contentId);

                xhr.send(data);
            }

            // Disqualify Student
            function disqualifyStudent(classroomId) {
                // Send an AJAX request to the server to disqualify the student
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/disqualify/' + classroomId, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Handle the response from the server if necessary
                        console.log('Student disqualified');
                    } else {
                        console.log('Unable to access');
                    }
                };
                xhr.send('classroomId=' + encodeURIComponent(classroomId));
            }

            // Disable copy and paste events
            document.addEventListener('copy', function(e) {
                e.preventDefault();
                showMessage('Unable to copy. Copying content is not allowed.');
            });

            document.addEventListener('paste', function(e) {
                e.preventDefault();
                showMessage('Unable to paste. Pasting content is not allowed.');
            });

            // Detect when the user switches tabs
            document.addEventListener('visibilitychange', function() {
                if (document.visibilityState === 'hidden' && !submitClicked) {
                    disqualifyStudent(classroomId);
                    showMessage('Switching tabs is not allowed during the quiz.');
                    // window.close();
                }
            });

            // When Window loses focus
            window.addEventListener('blur', function() {
                if (!submitClicked) {
                    disqualifyStudent(classroomId);
                    showMessage('Please stay within the current browser window.');
                    // window.close();
                }

            });

            //Right Click Detection
            document.addEventListener('contextmenu', function(e) {
                // e.preventDefault();
                showMessage('Right Click is Disabled');
            });

            // Helper function to display the message
            function showMessage(message) {
                var messageElement = document.createElement('div');
                messageElement.className = 'copy-message alert alert-danger';
                messageElement.textContent = message;

                document.getElementById("warning_msg").appendChild(messageElement);

                setTimeout(function() {
                    document.getElementById("warning_msg").removeChild(messageElement);
                }, 2000);
            }


        });
        </script>
    </body>

</html>