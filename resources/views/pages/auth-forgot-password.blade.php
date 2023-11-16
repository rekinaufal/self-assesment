{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Rapp</title>

    <link rel="icon" href="{{ asset('img/logo/rapp-mini-logo.png') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="app">
        <section class="">
            <div class="d-flex align-items-stretch flex-wrap">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="m-3 p-4">
                        <img src="{{ asset('img/logo/rapp-mini-logo.png') }}" alt="logo" width="80" class="mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">
                            Welcome to <span class="font-weight-bold">Rapp</span>
                        </h4>
                        <form method="POST" action="{{ route('login.post') }}" class="needs-validation" novalidate="">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong>Error!</strong> {{ $errors->first() }}
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your Username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <div class="input-group mb-2">
                                    <input id="password" type="password" class="form-control form-password" name="password" tabindex="2">
                                        <div class="input-group-prepend" style="cursor: pointer;">
                                            <div class="input-group-text icon-eye">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye PassIcon" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash hiddenPassIcon" viewBox="0 0 16 16">
                                                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                                </svg>
                                            </div>
                                        </div>
                                </div>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <a href="/auth-forgot-password" class="float-left mt-3">
                                    Forgot Password?
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>

                            <div class="mt-5 text-center">
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 min-vh-100 background-walk-y position-relative overlay-gradient-bottom order-1"
                    data-background="{{ asset('img/logo/rapp-logo.png') }}">
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function(){
            var showPass = false;
            $(".hiddenPassIcon").css("display", "block");
            $(".PassIcon").css("display", "none");

            $('.icon-eye').click(function(){
                console.log(showPass);
                if(showPass == false){
                    showPass = true;
                    $('.form-password').attr('type','text');
                    $(".hiddenPassIcon").css("display", "none");
                    $(".PassIcon").css("display", "block");
                }else{
                    showPass = false;
                    $('.form-password').attr('type','password');
                    $(".hiddenPassIcon").css("display", "block");
                    $(".PassIcon").css("display", "none");
                }
            });
        });
    </script>

    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html> --}}
{{-- =============================================================================================================== --}}

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>{{ $pageTitle }} &mdash; E-learning</title>
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .card-auth {
            aspect-ratio: auto;
            width: 100%;
        }

        @media only screen and (min-width: 1024px) {
            .card-auth {
                width: 70%;
                aspect-ratio: @if (session('errors') && !session('errors')->has('section')) auto @else 16/9 @endif;
            }
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        {{-- ! Old Login --}}
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        {{-- <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url({{ asset('assets/images/big/auth-bg.jpg') }}) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-6 col-md-5 modal-bg-img" style="background-image: url(assets/images/big/3.jpg);">
                </div>
                <div class="col-lg-6 col-md-7 bg-white">
                    <div class="p-3" id="login">
                        <form method="POST" action="{{ route('login.post') }}" class="needs-validation" novalidate="">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong>Error!</strong> {{ $errors->first() }}
                                    </div>
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close"
                                            data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                </div>
                            @endif
                            @if (session()->has('failed'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close"
                                            data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong>{{ session('failed') }}</strong>
                                    </div>
                                </div>
                            @endif
                            <div class="row" style="margin-top:20%; margin-bottom:20%">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="email">Email</label>
                                        <input class="form-control" id="email" name="email" type="text"
                                            placeholder="Email Adrress">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="text-dark">Password</label>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input id="password" type="password" class="form-control form-password" name="password" tabindex="2" placeholder="password">
                                                <div class="input-group-prepend" style="cursor: pointer;">
                                                    <div class="input-group-text icon-eyes">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye PassIcon" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash hiddenPassIcon" viewBox="0 0 16 16">
                                                            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                            <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input text-secondary" type="checkbox" value="1" name="remember" style="transform: scale(1.5);">
                                            <label class="form-check-label" for="defaultCheck1">
                                              Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="reguler" >
                                <div class="mt-3" style="width: 50%; margin: 0 auto;">
                                    <button type="submit" class="btn btn-block text-white" style="background-color: rgba(207, 31, 31, 0.827); border-radius:30px">LOGIN</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Don't have an account ? <a href="#" class="text-primary" onclick="signIn()">Sign Up</a>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <a href="/auth-forgot-password" class="text-primary">Forget Your Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="p-3" id="register">
                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <strong>Error!</strong> {{ $errors->first() }}
                                    </div>
                                </div>
                            @endif
                            <div class="row" style="margin-top:20%; margin-bottom:20%;">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control"  name="fullname" type="text" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="text" placeholder="Email Adrress">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <input type="password" class="form-control form-password-regist1" name="password" id="passwordCompany" value="{{ old('password') }}" tabindex="2" placeholder="Password">
                                                <div class="input-group-prepend" style="cursor: pointer;">
                                                    <div class="input-group-text icon-eyes-regist1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye PassIconRegist1" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash hiddenPassIconRegist1" viewBox="0 0 16 16">
                                                            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                            <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <input type="password" class="form-control form-password-regist2" id="confirm_passwordCompany" tabindex="2" placeholder="Confirm Password">
                                            <div class="input-group-prepend" style="cursor: pointer;">
                                                <div class="input-group-text icon-eyes-regist2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye PassIconRegist2" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash hiddenPassIconRegist2" viewBox="0 0 16 16">
                                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>
                                    <small><div id="showErrorPasswordCompany"></div></small>
                                </div>
                                <input type="hidden" name="user_category_id" value="1">
                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <div class="col-6" style="width: 50%; margin: 0 auto;">
                                            <button type="submit" class="btn btn-block text-white" style="background-color: rgba(207, 31, 31, 0.827); border-radius:30px">SIGNUP NOW</button>
                                        </div>
                                        <div class="col-6 d-flex flex-column align-items-center justify-content-center">
                                            <a href="#" class="text-primary" href="#" onclick="haveAccount()">I have an account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->


        {{-- ! New Login --}}
        <section
            class="w-100 bg-light mx-auto rounded d-flex justify-content-center align-items-center px-3 px-lg-0 py-5"
            style="min-height: 100vh; max-width: 1920px; height: auto">
            <div class="card-auth bg-white rounded" style="height: auto; box-shadow: 0 0 20px -5px black">
                <div class="w-100 h-100 row no-gutters">
                    <div class="left-content col-12 col-lg-6 d-none d-lg-block"
                        style="transform: scale(1.1) translateX(-2rem);">
                        <div class="closer w-100 h-100 position-relative"
                            style="background: rgb(181,0,0); background: linear-gradient(45deg, rgba(181,0,0,1) 0%, rgba(121,9,9,1) 31%, rgba(0,0,0,1) 100%);">
                            <div class="brand-logo w-100 h-auto d-flex justify-content-center"
                                style="padding-top: 10%; padding-bottom: 5%">
                                <img src="{{ asset('assets/images/Elearning.png') }}" alt="Brand Logo"
                                    class="w-50 h-auto">
                            </div>
                            <div class="brand-slogan text-light text-center">
                                <h3>TKDN Self Assessment Calculation Apps</h3>
                                <small>Proud of Local Product, Local Pride and For Better Indonesia Future</small>
                            </div>
                            <div class="wave-group position-absolute w-100" style="bottom: 0; left: 0;">
                                <div class="position-relative w-100">
                                    <div class="wave-1 position-absolute w-100" style="bottom: 0rem; left: 0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                            <path fill="#f3f4f5" fill-opacity="0.07"
                                                d="M0,288L40,250.7C80,213,160,139,240,96C320,53,400,43,480,58.7C560,75,640,117,720,149.3C800,181,880,203,960,229.3C1040,256,1120,288,1200,256C1280,224,1360,128,1400,80L1440,32L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                                            </path>
                                        </svg>
                                        <div class="svg-gradient w-100"
                                            style="height: 3rem; background: rgb(0,0,0);
                                        background: linear-gradient(0deg, rgba(0,0,0,0) 0%, rgba(243,244,245,0.07) 50%, rgba(243,244,245,0.07) 100%); transform: translateY(-0.5px)">
                                        </div>
                                    </div>
                                    <div class="wave-2 position-absolute w-100" style="bottom: 3rem; left: 0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                            <path fill="#f3f4f5" fill-opacity="0.07"
                                                d="M0,128L60,122.7C120,117,240,107,360,138.7C480,171,600,245,720,256C840,267,960,213,1080,160C1200,107,1320,53,1380,26.7L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                            </path>
                                        </svg>
                                        <div class="svg-gradient w-100"
                                            style="height: 5rem; background: rgb(0,0,0);
                                        background: linear-gradient(0deg, rgba(0,0,0,0) 0%, rgba(243,244,245,0.07) 50%, rgba(243,244,245,0.07) 100%); transform: translateY(-0.5px)">
                                        </div>
                                    </div>
                                    <div class="wave-3 position-absolute w-100"
                                        style="bottom: 6rem; left: 0; transform: scaleX(-1)">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                            <path fill="#f3f4f5" fill-opacity="0.07"
                                                d="M0,128L60,122.7C120,117,240,107,360,138.7C480,171,600,245,720,256C840,267,960,213,1080,160C1200,107,1320,53,1380,26.7L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                            </path>
                                        </svg>
                                        <div class="svg-gradient w-100"
                                            style="height: 5rem; background: rgb(0,0,0);
                                        background: linear-gradient(0deg, rgba(0,0,0,0) 0%, rgba(243,244,245,0.07) 50%, rgba(243,244,245,0.07) 100%); transform: translateY(-0.5px)">
                                        </div>
                                    </div>
                                    <div class="wave-4 position-absolute w-100"
                                        style="bottom: 9rem; left: 0; transform: scaleX(-1)">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                            <path fill="#f3f4f5" fill-opacity="0.07"
                                                d="M0,192L60,202.7C120,213,240,235,360,245.3C480,256,600,256,720,213.3C840,171,960,85,1080,85.3C1200,85,1320,171,1380,213.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                            </path>
                                        </svg>
                                        <div class="svg-gradient w-100"
                                            style="height: 5rem; background: rgb(0,0,0);
                                        background: linear-gradient(0deg, rgba(0,0,0,0) 0%, rgba(243,244,245,0.07) 50%, rgba(243,244,245,0.07) 100%); transform: translateY(-0.5px)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-content col-12 col-lg-6 px-3 py-3 p-md-5 w-100 h-100 d-flex justify-content-center align-items-center"
                        style="overflow: hidden">
                        <div id="authContent" class="content d-flex justify-content-center align-items-center w-100"
                            style="transform: translateX(@if (session('errors') && !session('errors')->has('section')) 75% @else -50% @endif); transition-duration: 400ms">
                            <div class="regist-form w-100" style="min-width: 100%; transform: translateX(-25%)">
                            </div>
                            <div class="login-form w-100" style="min-width: 100%;">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close"
                                                data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            <strong>{{ session('success') }}</strong>
                                        </div>
                                    </div>
                                @endif
                                @if(session()->has('failed'))
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close"
                                                data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            <strong>{{ session('failed') }}</strong>
                                        </div>
                                    </div>
                                @endif
                                <div class="welcome-text d-flex justify-content-center">
                                    <small class="text-center">
                                        We will send a link to reset your password
                                    </small>
                                </div>
                                <div class="form" style="padding-top: 4rem">
                                    <form action="/forgetPassword" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control @if (session('errors') && session('errors')->first('section') == 'login') is-invalid @endif"
                                                style="border: none; @if (session('errors') && session('errors')->first('section') == 'login') border-bottom: 1px solid rgba(255, 0, 0, 0.2); @else border-bottom: 1px solid rgba(0, 0, 0, 0.2); @endif"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Enter email" name="email">
                                        </div>
                                        <div class="button-submit w-100 d-flex justify-content-center pt-3">
                                            <button type="submit" class="btn btn-danger px-5">{{ $pageTitle }}</button>
                                        </div>
                                        <div class="sign-up d-flex justify-content-center pt-4">
                                            <small>
                                                Do you want to log in?, 
                                                <a href="/">
                                                    <span class="text-danger" style="border-bottom: 1px solid #ff4f70; cursor: pointer;">
                                                        Sign In
                                                    </span>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="company-name pt-5 d-flex justify-content-center">
                                            <small>PT. ARTEK SINERGI MULTIMEDIA</small>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->

    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>
