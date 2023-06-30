<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title> User Login </title>
        <link rel="stylesheet" href=" {{ asset('assets/bootstrap/css/bootstrap.min.css') }} ">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    </head>

    <body>
        <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
            <div class="row g-0" style="margin-right: 0px;margin-left: 0px;overflow: hidden;">
                <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                    <div class="p-5">
                        <a href="/">
                            <img width="182" height="68" src="{{ asset('assets/img/logo11-1@2x.png') }}">
                        </a>
                        <div class="text-center">
                            <h4 class="text-dark mb-4" style="color: #151b3d;font-weight: bold;">Reset Password</h4>
                        </div>

                        @if(session()->has('error'))
                        <div class="alert alert-danger"> {{ session('error') }} </div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success"> {{ session('success') }} </div>
                        @endif

                        <form action="/user_reset_password" method="post" class="user">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"
                                    required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-primary d-block btn-user w-100" type="submit"
                                style="background: #151B3D;">Reset Password</button>
                            <hr>
                        </form>
                        <div class="text-center"></div>
                        <!-- <div class="text-center">
                        <a class="small" href="/student_register">Create an Account!</a>
                    </div> -->
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 col-xxl-6"
                    style="background: #FFB600;min-height: 100vh;padding: 0px 0px 0px 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;margin: 0px 0px 0px 0px;">

                    <img width="392" height="337" src="{{ asset('assets/img/image%2028.png') }} "
                        style="padding-top: 40px;margin-top: 96px;">
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://geodata.solutions/includes/countrystate.js"></script>
        <script src=" {{ asset('assets/js/script.min.js') }} "></script>
    </body>

</html>