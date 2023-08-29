<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to California Training</title>
    </head>

    <body>
        <h1>Welcome to California Training</h1>

        <p>Dear {{$student->fullname}},</p>

        <p>Thank you for registering with California Training. We are excited to have you on board!</p>

        <p>Please feel free to explore our platform and take advantage of our training resources.</p>

        <p>If you have any questions or need assistance, don't hesitate to reach out to our support team at
            support@edu-cti.com.</p>

        <p>
            Your ID: <strong>CTI/{{$identification}}</strong>
        </p>

        <p>
            http://portal.edu-cti.com/
            Your password is: <strong>{{$password}}</strong>

        </p>

        <p>Best regards,</p>
        <p>The California Training Team</p>
    </body>

</html>