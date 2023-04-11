<!DOCTYPE html>
<html>

    <head>
        <title>Certificate of Completion</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            position: relative;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 50px;
            text-align: center;
            text-transform: uppercase;
            color: #0d6efd;
            letter-spacing: 2px;
            font-weight: 700;
            line-height: 1;
        }

        h2 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 50px;
            color: #16416E;
            font-weight: 700;
            line-height: 1;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 30px;
            color: #16416E;
            font-weight: 700;
            line-height: 1;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 10px;
            text-align: center;
        }

        .signature {
            position: absolute;
            bottom: 100px;
            right: 100px;
            width: 150px;
            height: auto;
        }

        @media only screen and (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 36px;
            }

            h2 {
                font-size: 24px;
            }

            h3 {
                font-size: 18px;
            }

            p {
                font-size: 16px;
            }

            .signature {
                position: absolute;
                bottom: 30px;
                right: 30px;
                width: 100px;
                height: auto;
            }
        }
        </style>
    </head>

    <body>
        <div class="container bg-warning">
            <h1 class="text-primary">Certificate of Completion</h1>
            <h2>This certificate is awarded to</h2>
            <h2>{{$student_name}}</h2>
            <h3 class="text-center">for successfully completing the course:</h3>
            <h2>DIgital Marketing</h2>
            <p>Issued on Todays</p>
        </div>
    </body>

</html>