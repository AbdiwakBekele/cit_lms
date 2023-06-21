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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <title>Quiz</title>

        <style>
        .hoverable:hover {
            cursor: pointer;
            background-color: #f5f5f5;
        }

        .form_header_content {
            padding-top: 0.625rem;
        }

        .form_header_content h2 {
            font-size: 2.8125rem;
            background: -webkit-linear-gradient(#36d0dc, #5a87e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .form_header_content span {
            color: #000a38;
            font-size: 1.25rem;
            font-weight: 700;
        }

        .form_btn .f_btn {
            font-size: 1.25rem;
            font-weight: 800;
            padding: 0.9375rem 1.5625rem;
            outline: none;
            border: none;
            margin-right: 0.625rem;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .form_btn .disable {
            color: #ffffff;
            background-color: #000000;
        }

        .form_btn .disable:hover {
            color: #000000 !important;
            background-color: #ffffff;
        }

        .form_btn .active {
            color: #ffffff;
            background: -webkit-gradient(linear, left top, right top, from(#36d0dc), to(#5b87e5));
            background: linear-gradient(to right, #36d0dc, #5b87e5);
        }

        .form_btn .active:hover {
            color: #000000 !important;
            background: -webkit-gradient(linear, left top, right top, from(#5b87e5), to(#36d0dc));
            background: linear-gradient(to right, #5b87e5, #36d0dc);
        }

        .progress {
            width: 85%;
            margin: 2.1875rem 0 1.25rem 3.75rem;
        }

        .progress .progress-bar {
            background: -webkit-gradient(linear, left top, right top, from(#36d1dc), to(#5b87e5));
            background: linear-gradient(to right, #36d1dc, #5b87e5);
        }

        .question_number {
            color: #000a38;
            font-size: 1.0625rem;
            font-weight: 700;
            margin-right: 5.176rem;
        }

        .multisteps_form {
            width: 100%;
            min-height: 43.75rem;

            background-repeat: no-repeat;
            background-position: top right;
            border-radius: 0.5rem;
            margin: 0 auto;

        }

        .wrapper {
            width: 100%;
            min-height: 100vh;
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(33, 147, 176, 0.7)), to(rgba(18, 124, 148, 0.7))), url("../images/bg-img/bg-1.png");
            background-image: linear-gradient(to right, rgba(22, 65, 110, 1), rgba(22, 65, 110, 0.8)), url("../images/bg-img/bg-1.png");
            background-position: center;
            background-size: cover;
            overflow-x: hidden;
            padding-top: 1.25rem;
        }

        .count_box {
            width: 19rem;
            height: 6.0625rem;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-pack: distribute;
            justify-content: space-around;
            background: -webkit-gradient(linear, left top, right top, from(#2193b0), to(#6dd5ed));
            background: linear-gradient(to right, #FFB600, #6dd5ed);
        }

        .count_clock img {
            width: 3rem;
        }

        .count_title h4 {
            color: #000a38;
            font-size: 1.375rem;
            margin-bottom: -0.4rem;
        }

        .count_title span {
            color: #000a38;
            font-size: 1.375rem;
            font-weight: 700;
        }

        .count_number {
            width: 7rem;
            height: 5rem;
        }

        .count_number h3 {
            color: #000a38;
            font-size: 1.75rem;
            font-weight: 800;
            margin-top: 0.9rem;
            margin-bottom: -0.3rem;
        }

        .count_number span {
            color: #595959;
            font-size: 1rem;
            font-weight: 800;
        }

        .form_items {
            padding-left: 1.25rem;
        }

        .form_items label {
            width: 50%;
            color: #000a38;
            font-size: 1.3125rem;

            cursor: pointer;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
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
                                <a href="#">
                                    <img src="{{ asset('assets/admin/images/wAsset 3@300x.png') }}" class="logo-icon"
                                        alt="logo icon" width="100px">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 d-none d-md-block">
                            <div class="count_box overflow-hidden rounded-pill d-flex float-end me-4">
                                <div class="count_clock ps-2">
                                    <img src="/images/clock.png" alt="image_not_found">
                                </div>
                                <div class="count_title px-1">
                                    <h4 class="pe-5">Quiz</h4>
                                    <span>Time start</span>
                                </div>
                                <div class="count_number rounded-pill bg-white overflow-hidden me-2 text-center countdown_timer"
                                    data-countdown="2022/10/24">
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
                    @csrf
                    @auth('student')
                    <input type="hidden" name="student_id" value="{{auth('student')->user()->id}}">
                    @endauth

                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <div id="questions">

                                @foreach($questions as $question)
                                <div class="question" style="display:none; ">

                                    <div class="card mb-4" style="display: block; ">
                                        <div class="form_header_content text-center pt-4"
                                            style="padding-top: 0.625rem;">
                                            <h2>QUIZ</h2>
                                            <span>Fill out this quiz for fun!</span>
                                        </div>
                                        <span class="question_number text-uppercase mb-3 float-end">QUESTION 1/4</span>
                                        <div class="progress rounded-pill">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="card-header">
                                            <h2 class="px-5 py-3"
                                                style="text-align: justify; color: #000a38;font-size: 1.75rem; font-weight: 700;">
                                                {{ $question->question }}
                                            </h2>
                                        </div>

                                        <div class="ps-5 form_items">
                                            <?php 
                                            $options = DB::table('quiz_options')->where('quiz_id', $question->id)->get();
                                        ?>
                                            @foreach($options as $option)
                                            <div class="form-check hoverable px-5 py-3 m-1 rounded-pill">
                                                <ul class="list-unstyled p-0">

                                                    <input class="form-check-input" type="radio"
                                                        name="answer[{{$question->id}}]" value="{{ $option->option}}"
                                                        id="{{ $option->id }}">
                                                    <label class="form-check-label" for="{{ $option->id }}">
                                                        {{ $option->option}}
                                                    </label>

                                                </ul>
                                            </div>
                                            @endforeach

                                        </div>

                                    </div>
                                    <div class="form_btn py-5 text-center">
                                        <button type="button"
                                            class="f_btn disable text-uppercase rounded-pill text-white" id="prevBtn"
                                            onclick="nextQuestion()"><span><i class="fas fa-arrow-left"></i></span> Last
                                            Question
                                        </button>

                                        <button type="button"
                                            class="f_btn active text-uppercase rounded-pill text-white" id="nextBtn"
                                            onclick="nextQuestion(0)"> Next Question <i class="fas fa-arrow-right"></i>
                                        </button>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button
                                class="btn btn-lg btn-success m-3 f_btn active text-uppercase rounded-pill text-white"
                                type="submit">Submit</button>
                        </div>

                    </div>
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

            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab


            function showTab(n) {
                // This function will display the specified tab of the form ...
                var x = document.getElementsByClassName("question");
                x[n].style.display = "block";
                // ... and fix the Previous/Next buttons:

                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }

                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next Question" +
                        ' <span><i class="fas fa-arrow-right"></i></span>';
                }

            }
            </script>
    </body>

</html>