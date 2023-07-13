<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Quiz Result</title>
        <!-- FontAwesome-cdn include -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <!-- Google-fonts-include -->
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&family=Oswald:wght@700&display=swap"
            rel="stylesheet" />
        <!-- Bootstrap-css include -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <!-- Main-StyleSheet include -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <style>
        body {
            background: linear-gradient(to right, #ffb600, #ffb600);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .check_mark_img img {
            max-width: 100%;
            height: auto;
        }

        .sub_title {
            text-align: center;
        }

        .sub_title span {
            font-size: 24px;
            font-weight: 700;
            color: #16416E;
            font-family: "Oswald", sans-serif;
            text-transform: uppercase;
        }

        .title {
            text-align: center;
        }

        .title h3 {
            font-size: 36px;
            font-weight: 700;
            color: #16416E;
            font-family: "Jost", sans-serif;
        }

        .btn-continue {
            background-color: #16416E;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-continue:hover {
            background-color: #e4921a;
        }
        </style>
    </head>

    <body>
        <div class="container">

            <img src="../images/checkmark.png" width="50%" alt="image_not_found" />

            <div class="sub_title">
                <span>You have passed the test</span>
            </div>
            <div class="title">
                <h3>You can proceed to the next section</h3>
                <h3>Your Scored: {{$correct_score}}</h3>
            </div>
            <div>
                <button id="btn_continue" class="btn btn-continue">
                    Continue Learning
                </button>
            </div>
        </div>

        <!-- Bootstrap-js include -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script>
        var btn_continue = document.getElementById("btn_continue");
        btn_continue.addEventListener("click", function() {
            window.close();
        });
        </script>
    </body>

</html>