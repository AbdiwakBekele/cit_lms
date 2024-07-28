<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title> Student Login </title>
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
                            <h4 class="text-dark mb-4" style="color: #151b3d;font-weight: bold;">Welcome Back!</h4>
                        </div>

                        @if(session()->has('error'))
                        <div class="alert alert-danger"> {{ session('error') }} </div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success"> {{ session('success') }} </div>
                        @endif

                        <form action="/student_login" method="post" class="user">
                            @csrf
                            <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"
                                style="background: #ffffff;box-shadow: 0px 0px 9px 0px;color: #000000;border-top-color: #ffffff;border-right-style: none;border-right-color: #ffffff;border-bottom-color: #ffffff;border-left-color: #ffffff;">
                                <i class="fab fa-google"></i> &nbsp; Login with Google
                            </a>
                            <div class="mb-3">
                                <p class="text-start" style="width: 539px;text-align: center;">Or Login with</p>
                                <input class="form-control form-control-user" type="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="password" id="password"
                                    placeholder="Password" name="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="custom-control custom-checkbox small">
                                    <div class="form-check">
                                        <input class="form-check-input custom-control-input" type="checkbox"
                                            id="formCheck-1">
                                        <label class="form-check-label custom-control-label" for="formCheck-1">Keep Me
                                            Logged in</label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary d-block btn-user w-100" type="submit"
                                style="background: #151B3D;">Login</button>
                            <a class="small" href="/forget_password">Forgot Password?</a>
                            <hr>
                        </form>
                        <div class="text-center"></div>
                        <!-- <div class="text-center">
                        <a class="small" href="/student_register">Create an Account!</a>
                    </div> -->


                        <!-- Feedback -->
                        <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" href="feedback/create"
                            role="button"
                            style="background: #ffffff;box-shadow: 0px 0px 9px 0px;color: #000000;border-top-color: #ffffff;border-right-style: none;border-right-color: #ffffff;border-bottom-color: #ffffff;border-left-color: #ffffff;">
                            <i class="fab fa-message"></i> &nbsp; Give us your feedback
                        </a>

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