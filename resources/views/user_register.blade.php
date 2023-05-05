<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title> User Register </title>
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href=" {{ asset('assets/css/styles.min.css') }} ">
    </head>

    <body>
        <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
            <div class="row g-0" style="margin-right: 0px;margin-left: 0px;overflow: hidden;">
                <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                    <div class="p-5">
                        <a href="/">
                            <img width="182" height="68" src=" {{ asset( 'assets/img/logo11-1@2x.png') }}">
                        </a>
                        <div class="text-center">
                            <h4 class="text-dark mb-4" style="color: #151b3d;font-weight: bold;">User Registration</h4>
                        </div>

                        @if(session()->has('error'))
                        <div class="alert alert-danger"> {{ session('error') }} </div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success"> {{ session('success') }} </div>
                        @endif

                        <form action="/user_register" method="post" class="user">
                            {{ csrf_field() }}
                            <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"
                                style="background: #ffffff;box-shadow: 0px 0px 9px 0px;color: #000000;border-top-color: #ffffff;border-right-style: none;border-right-color: #ffffff;border-bottom-color: #ffffff;border-left-color: #ffffff;"><i
                                    class="fab fa-google"></i>&nbsp; Login with Google</a>

                            <!-- Fullname -->
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="text" id="fullname"
                                    placeholder="Enter Fullname" name="fullname">
                                @error('fullname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Age -->
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="number" id="age"
                                    placeholder="Enter age" name="age">
                                @error('age')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="tel" id="phone"
                                    placeholder="Enter phone number" name="phone">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="text" id="address"
                                    placeholder="Enter address" name="address">
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <input class="form-control form-control-user" type="password" id="password"
                                    placeholder="Password" name="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary d-block btn-user w-100" type="submit"
                                style="background: #151B3D;">Register</button>

                            <hr>
                            <p style="text-align: center"> Already Have an accout?</p>

                            <a class="btn btn-primary d-block btn-user w-100 bg-warning text-dark"
                                href="/user_login">Login</a>


                        </form>

                    </div>
                </div>
                <div class="col-md-6 col-xl-6 col-xxl-6"
                    style="background: #FFB600;min-height: 100vh;padding: 0px 0px 0px 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;margin: 0px 0px 0px 0px;">

                    <img width="392" height="337" src="{{ asset( 'assets/img/image%2028.png' ) }}"
                        style="padding-top: 40px;margin-top: 96px;">
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://geodata.solutions/includes/countrystate.js"></script>
        <script src=" {{ 'assets/js/script.min.js' }} "></script>
    </body>

</html>