<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz Result</title>
        <!-- FontAwesome-cdn include -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Google-fonts-include -->
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&family=Oswald:wght@700&display=swap"
            rel="stylesheet">
        <!-- Bootstrap-css include -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Main-StyleSheet include -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body style="background: linear-gradient(rgba(22, 65, 110, 0.3), rgba(22, 65, 110, 0.3)); object-fit: cover; ">



        <div id="wrapper">
            <div class="container">
                <div class="row text-center">
                    <div class="check_mark_img">
                        <img src="../images/checkmark.png" alt="image_not_found">
                    </div>
                    <div class="sub_title">
                        <span>Your have passed the test</span>
                    </div>
                    <div class="title pt-1">
                        <h3>You can proceed to the next section</h3>
                        <h3>Your Scored: {{$correct_score}}</h3>

                    </div>
                    <div>
                        <button class="btn btn-warning"><a href="/my_course_single/{{$course_id}}">Continue
                                Learning</a></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap-js include -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

</html>