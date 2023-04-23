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

        @if(session()->has('success'))
        <div class="alert alert-danger"> {{ session('success') }} </div>
        @endif

        <h1>User Register</h1>

        <form action="/user_register" method="post">
            {{ csrf_field() }}
            Name: <input type="text" name="fullname"><br>
            Age: <input type="number" name="age"><br>
            Phone: <input type="tel" name="phone"><br>
            Address: <input type="text" name="address"><br>
            email: <input type="email" name="email"><br>
            password: <input type="password" name="password"><br>
            <input type="submit">
        </form>

    </body>

</html>