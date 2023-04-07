<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        <div class="container">
            <h1>Quiz</h1>
            <form method="post" action="/my_quiz">
                @csrf
                @auth('student')
                <input type="hidden" name="student_id" value="{{auth('student')->user()->id}}">
                @endauth

                <div id="questions">

                    @foreach($questions as $question)
                    <div class="question" style="display:none;">
                        <h2>{{ $question->question }}</h2>

                        <?php 
                            $options = DB::table('quiz_options')->where('quiz_id', $question->id)->get();
                        ?>

                        @foreach($options as $option)
                        <div>
                            <label>
                                <input type="radio" name="answer[{{$question->id}}]" value="{{ $option->option}}">
                                {{ $option->option}}
                            </label>
                        </div>
                        @endforeach

                        <button type="button" onclick="nextQuestion()">Next question</button>
                    </div>
                    @endforeach
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
        <script>
        var questions = document.querySelectorAll('.question');
        var currentQuestion = 0;

        function nextQuestion() {
            questions[currentQuestion].style.display = 'none';
            currentQuestion++;
            if (currentQuestion >= questions.length) {

            } else {
                questions[currentQuestion].style.display = 'block';
            }
        }
        questions[currentQuestion].style.display = 'block';
        </script>

    </body>

</html>