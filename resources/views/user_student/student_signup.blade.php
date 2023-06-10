<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Registration</title>
    <link rel="stylesheet" href=" {{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href=" {{ asset('assets/css/styles.min.css') }} ">
</head>

<body>
    <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
        <div class="row" style="margin-right: 0px;margin-left: 0px;overflow: hidden;">
            <div class="col-md-6" style="padding-right: 0px;padding-left: 0px;">
                <div class="p-5"><img width="208" height="60" src="{{ asset('images/logo-11 1.png') }}">
                    <div class="text-center">
                        <h4 class="text-dark"
                            style="color: #151b3d;font-weight: bold;margin-bottom: 0px;margin-left: 0px;font-size: 43.2px;">
                            Register</h4>
                        <h4 class="text-dark mb-4" style="color: #151b3d;font-weight: bold;font-size: 20px;">Provide
                            Your Contact Information to Register</h4>
                    </div>

                    @if(session()->has('error'))
                    <div class="alert alert-danger"> {{ session('error') }} </div>
                    @endif

                    @if(session()->has('success'))
                    <div class="alert alert-success"> {!! nl2br(e(session('success'))) !!} </div>
                    @endif

                    <form action="/student_register" method="post" class="user">
                        {{ csrf_field() }}
                        <a class="btn btn-primary text-center d-block btn-google btn-user w-100 mb-2" role="button"
                            style="background: #ffffff;box-shadow: 0px 0px 9px 0px;color: #000000;border-top-color: #ffffff;border-right-style: none;border-right-color: #ffffff;border-bottom-color: #ffffff;border-left-color: #ffffff;"><i
                                class="fab fa-google"></i>&nbsp; Register with Google</a>
                        <p class="text-start" style="width: 657px;text-align: left;">Or Register with</p>
                        <!-- Fullname -->
                        <div class="mb-3">
                            <input class="form-control" type="text" name="fullname" placeholder="Student Full Name"
                                required>
                            @error('fullname')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <input class="form-control" type="email" name="email" placeholder="Email" id="email"
                                required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="">Choose Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Age -->
                        <div class="mb-3">
                            <input class="form-control" type="number" name="age" placeholder="Age" id="age" required>
                            @error('age')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <input class="form-control" type="tel" name="phone" placeholder="Phone Number" id="phone"
                                required>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <input class="form-control" type="address" name="address" placeholder="Address" id="address"
                                required>
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" placeholder="password"
                                id="password" required>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary d-block btn-user w-100" type="submit"
                            style="background: #151B3D;font-size: 18px;font-family: Poppins, sans-serif;font-weight: bold;">Register</button>
                        <hr>
                    </form>

                    <div class="text-center">
                        <a class="small" href="/student_login"
                            style="color: #ffb600;font-size: 18px;font-family: Poppins, sans-serif;">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6 col-xxl-6"
                style="background: #151b3d;min-height: 100vh;padding: 0px 0px 0px 0px;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;margin: 0px 0px 0px 0px;">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
</body>

</html>