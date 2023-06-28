<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <title>Final Exam</title>

    <style>
    .hoverable:hover {
        cursor: pointer;
        background-color: #f5f5f5;
    }

    .question {
        width: 100%;
    }

    body {
        background-color: #FFB600;
    }

    .container {
        background-color: #16416E;
        color: #ddd;

        padding: 20px;
        font-family: 'Montserrat', sans-serif;
        max-width: 75%;

    }

    .form-check-input {
        height: 25px;
        width: 25px;
        background-color: #fff;
        border: 1px solid #FFB600;
        border-radius: 50%;

    }

    .form-check label {

        font-size: 20px;
        cursor: pointer;
    }

    .form-check input {
        opacity: 1;
    }
    </style>
</head>

<body>
    <div class="container mt-sm-5 my-1">
        <h1 class="text-center mb-4">Final Exam</h1>
        <form method="post" action="/my_final/{{$classroom_id}}">
            @csrf
            @auth('student')
            <input type="hidden" name="student_id" value="{{auth('student')->user()->id}}">
            @endauth

            <div class="container">
                <div id="warning_msg"></div>

                <div class="row justify-content-center">

                    <div class="text-center" id="msg">
                        <img src=" {{ asset('images/checkmark.png') }}" width="100px" alt="image_not_found">
                        <h4 class="text-center">
                            Quiz Successfully Completed
                    </div>

                    <div class="col-md-8 ">

                        <div id="questions">

                            @foreach($questions as $question)
                            <div class="question ml-sm-5 pl-sm-5 pt-2" style="display:none;">

                                <div class="py-2 h5"><b>{{ $question->question }}</b></div>


                                <div class="card-body">
                                    <?php 
                                            $options = DB::table('quiz_options')->where('quiz_id', $question->id)->get();
                                        ?>

                                    @foreach($options as $option)

                                    <div class="form-check py-1">
                                        <input class="form-check-input" type="radio" name="answer[{{$question->id}}]"
                                            value="{{ $option->option}}" id="{{ $option->id }}">
                                        <label class="form-check-label px-2" for="{{ $option->id }}">
                                            {{ $option->option}}
                                        </label>
                                    </div>
                                    @endforeach


                                </div>


                                <button class="btn btn-primary float-right m-3" type="button"
                                    onclick="nextQuestion()">Next question</button>


                            </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success m-3" id="btn_submit" type="submit">Submit</button>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>

    <script>
    var questions = document.querySelectorAll('.question');
    var currentQuestion = 0;
    questions[currentQuestion].style.display = 'block';
    document.getElementById('btn_submit').style.display = 'none';
    document.getElementById('msg').style.display = 'none';

    function nextQuestion() {
        questions[currentQuestion].style.display = 'none';
        currentQuestion++;
        if (currentQuestion == questions.length) {
            document.getElementById('msg').style.display = 'block';
            document.getElementById('btn_submit').style.display = 'block';
        } else {
            questions[currentQuestion].style.display = 'block';
        }
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
        if (document.visibilityState === 'hidden') {
            // User switched away from the tab, take appropriate action here
            showMessage('Switching tabs is not allowed during the quiz.');
        }
    });

    // Detect when the browser window loses focus
    window.addEventListener('blur', function() {
        showMessage('Please stay within the current browser window.');
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
    </script>
</body>

</html>