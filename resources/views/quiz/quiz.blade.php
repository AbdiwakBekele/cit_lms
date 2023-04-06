<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz</title>
        <!-- FontAwesome-cdn include -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&display=swap"
            rel="stylesheet">
        <!-- Bootstrap-css include -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- Animate-css include -->
        <link rel="stylesheet" href="../assets/css/animate.min.css">
        <!-- Main-StyleSheet include -->
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>
        <div class="wrapper position-relative">
            <div class="top_content_area pt-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logo_area ms-5">
                                <a href="index.html">
                                    <img src="../assets/images/logo/logo.png" style="width: 30%;"
                                        alt="image_not_found_logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-md-block">
                            <div class="count_box overflow-hidden rounded-pill d-flex float-end me-5">
                                <div class="count_clock ps-2">
                                    <img src="../assets/images/counter/clock.png" alt="image_not_found">
                                </div>
                                <div class="count_title px-1">
                                    <h4 class="pe-5">Quiz</h4>
                                    <span>Time start</span>
                                </div>
                                <div class="count_number rounded-pill bg-white overflow-hidden me-2 text-center countdown_timer"
                                    data-countdown="2022/10/24">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form class="multisteps_form position-relative overflow-hidden mt-5" id="wizard" method="POST"
                    action="/my_quiz">

                    <input type="hidden" name="question_count" value="{{count($questions)}}">

                    @csrf
                    <!-- Form-header-content -->
                    <div class="form_header_content text-center pt-4">
                        <h2>QUIZ</h2>
                        <span>Fill out this quiz</span>
                    </div>

                    <?php $index=0; ?>
                    @foreach($questions as $question)

                    <!------------------------- Step-1 ----------------------------->
                    <div class="multisteps_form_panel step">
                        <!-- Form-content -->

                        <div class="progress rounded-pill">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ ($index/count($questions)) * 100 }}%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <span class="question_number text-uppercase mb-3 float-end">QUESTION
                            {{++$index}}/{{count($questions)}}</span>
                        <h1 class="question_title px-5 py-3 animate__animated animate__fadeInRight animate_25ms">
                            {{$question->question}}
                        </h1>

                        <!-- Form-items -->
                        <div class="form_items ps-5">
                            <ul class="list-unstyled p-0">
                                <li
                                    class="active step_1 ps-5 rounded-pill animate__animated animate__fadeInRight animate_50ms">
                                    <input type="radio" id="option_{{$index}}" name="_{{$question->id}}"
                                        value="{{$question->answer_1}}">
                                    <label for="option_{{$index}}">{{$question->answer_1}}</label>
                                </li>

                                <li
                                    class="step_1 ps-5 rounded-pill animate__animated animate__fadeInRight animate_100ms">
                                    <input type="radio" id="option_{{$index}}" name="_{{$question->id}}"
                                        value="{{$question->answer_2}}">
                                    <label for="option_{{$index}}">{{$question->answer_2}}</label>
                                </li>

                                <li
                                    class="step_1 ps-5 rounded-pill animate__animated animate__fadeInRight animate_150ms">
                                    <input type="radio" id="option_{{$index}}" name="_{{$question->id}}"
                                        value="{{$question->answer_3}}">
                                    <label for="option_{{$index}}">{{$question->answer_3}}</label>
                                </li>

                                <li
                                    class="step_1 ps-5 rounded-pill animate__animated animate__fadeInRight animate_200ms">
                                    <input type="radio" id="option_{{$index}}" name="_{{$question->id}}"
                                        value="{{$question->answer_4}}">
                                    <label for="option_{{$index}}">{{$question->answer_4}}</label>
                                </li>

                            </ul>
                        </div>
                    </div>
                    @endforeach
            </div>
            </form>
            <!---------- Form Button ---------->
            <div class="form_btn py-5 text-center">
                <button type="button" class="f_btn disable text-uppercase rounded-pill text-white" id="prevBtn"
                    onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Previous Question</button>

                <button type="button" class="f_btn active text-uppercase rounded-pill text-white" id="nextBtn"
                    onclick="nextPrev(1)"> Next Question <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        <!-- jQuery-js include -->
        <script src="../assets/js/jquery-3.6.0.min.js"></script>
        <!-- Countdown-js include -->
        <script src="../assets/js/countdown.js"></script>
        <!-- Bootstrap-js include -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- jQuery-validate-js include -->
        <script src="../assets/js/jquery.validate.min.js"></script>
        <!-- Custom-js include -->
        <script src="../assets/js/script.js"></script>
    </body>

</html>