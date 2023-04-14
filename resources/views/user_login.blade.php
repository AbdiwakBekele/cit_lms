<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>

        @if(session()->has('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div>
        @endif

        <form action="/user_login" method="post">
            {{ csrf_field() }}
            email: <input type="email" name="email">
            password: <input type="password" name="password">
            <input type="submit">
        </form>

    </body>

</html>