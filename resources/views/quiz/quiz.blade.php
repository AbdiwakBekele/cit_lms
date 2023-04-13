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
        <link rel="stylesheet" href="../assets/css/quizstyle.css">

        <title>Quiz</title>

        <style>
        .hoverable:hover {
            cursor: pointer;
            background-color: #f5f5f5;
        }
        </style>
    </head>

    <body>
    <div class="wrapper position-relative">
    <div class="top_content_area pt-2">
        <div class="container-fluid">
        <div class="row">
         <div class="col-md-6">
            <div class="logo_area ms-5">
               <a href="index.html">
                  <img src="/images/logo.png" style="width: 30%;" alt="image_not_found">
               </a>
            </div>
         </div>
         <div class="col-md-6 d-none d-md-block">
            <div class="count_box overflow-hidden rounded-pill d-flex float-end me-5">
               <div class="count_clock ps-2">
                  <img src="/images/clock.png" alt="image_not_found" style="width: 3rem;">
               </div>
               <div class="count_title px-1">
                  <h4 class="pe-5">Quiz</h4>
                  <span>Time start</span>
                    </div>
                     <div class="count_number rounded-pill bg-white overflow-hidden me-2 text-center countdown_timer" data-countdown="2022/10/24">
                    <h3>00</h3> 
                    <span class="text-uppercase">sec</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
         <div class="container">
            <form class="multisteps_form position-relative overflow-hidden mt-5" method="post" action="/my_quiz">
            <div class="form_header_content text-center pt-4">
         <h2>QUIZ</h2>
         <span>Fill out this quiz for fun!</span>
      </div>  
      <div class="multisteps_form_panel step">
      <span class="question_number text-uppercase mb-3 float-end">QUESTION 1/4</span>
      <div class="progress rounded-pill">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
            @csrf
                @auth('student')
                <input type="hidden" name="student_id" value="{{auth('student')->user()->id}}">
                @endauth
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div id="questions">
                            @foreach($questions as $question)
                            

                                
                                    <div class="card-header">
                                    <h2 class="question_title px-5 py-3 animate__animated animate__fadeInRight animate_25ms">{{ $question->question }}
                                        </h2>
                                    </div>
                                    <div class="form_items ps-5">
                                   
                                        <?php 
                                            $options = DB::table('quiz_options')->where('quiz_id', $question->id)->get();
                                        ?>
                                        @foreach($options as $option)


                                        <div class="form-check hoverable p-4 m-2 rounded-pill">
                                            <input class="form-check-input" type="radio"
                                                name="answer[{{$question->id}}]" value="{{ $option->option}}"
                                                id="{{ $option->id }}">
                                            <label class="form-check-label" for="{{ $option->id }}">
                                                {{ $option->option}}
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>

                               
                               
                            </div>
                            @endforeach
                        </div>
                        <div class="form_btn py-5 text-center">
                            <button type="button" class="f_btn disable text-uppercase rounded-pill text-white" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
                             <button type="button" class="f_btn active text-uppercase rounded-pill text-white" id="nextBtn" onclick="nextPrev(1)"> Next Question <i class="fas fa-arrow-right"></i></button>
                         </div>  
                    </div>
                </div>

            </form>
        </div>
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