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
            <form method="post" action="/quizzzz">
                @csrf

                <div id="questions">
                    <?php $index=1; ?>
                    @foreach($questions as $question)
                    <input type="hidden" name="correct_{{$index}}" value="{{$question->answer}}">
                    <div class="question" style="display:none;">
                        <h2>{{ $question->question }}</h2>
                        <ul>
                            <!-- First Choose -->
                            <li>
                                <label>
                                    <input type="radio" name="q{{$index}}_answer_1" value="{{ $question->answer_1 }}">
                                    {{ $question->answer_1 }}
                                </label>
                            </li>

                            <!-- Second Choose -->
                            <li>
                                <label>
                                    <input type="radio" name="q{{$index}}_answer_2" value="{{ $question->answer_2 }}">
                                    {{ $question->answer_2 }}
                                </label>
                            </li>
                            <!-- Third Choose -->
                            <li>
                                <label>
                                    <input type="radio" name="answer-{{ $question->id }}"
                                        value="{{ $question->answer_3 }}">
                                    {{ $question->answer_3 }}
                                </label>
                            </li>
                            <!-- Forth Choose -->
                            <li>
                                <label>
                                    <input type="radio" name="answer-{{ $question->id }}"
                                        value="{{ $question->answer_4 }}">
                                    {{ $question->answer_4 }}
                                </label>
                            </li>

                        </ul>
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