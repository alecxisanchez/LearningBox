<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LearningBox | Inicio de Sesión</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Google USer Content
    <meta name="google-signin-client_id" content="745164511534-k038ht9q3p1kvmmq7hhc0eluto9jqcpu.apps.googleusercontent.com">
    -->
    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&display=swap" rel="stylesheet">
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('sitio/assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('sitio/assets/css/material-icons.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('sitio/assets/css/fontawesome.css') }}" rel="stylesheet">
    <!-- Preloader -->
    <link type="text/css" href="{{ asset('sitio/assets/vendor/spinkit.css') }}" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="{{ asset('sitio/assets/css/app.css') }}" rel="stylesheet">
    <!-- App Custom CSS -->
    <link type="text/css" href="{{ asset('sitio/assets/css/app-custom.css') }}" rel="stylesheet">

</head>

<body class="login">

<div class="d-flex align-items-center" style="min-height: 100vh">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
        <div class="text-center mt-5 mb-1">
            <div class="avatar avatar-lg">
                <img src="{{ asset('sitio/assets/images/logo/primary.svg') }}" class="avatar-img rounded-circle" alt="LearnPlus" />
            </div>
        </div>
        <div class="d-flex justify-content-center mb-5 navbar-light">
            <a href="#" class="navbar-brand m-0">LearningBox</a>
        </div>
        <div class="card navbar-shadow">
            <div class="card-header text-center">
                <h4 class="card-title">Inicio de Sesión</h4>
                <p class="card-subtitle">Accede a tu cuenta</p>
            </div>
            <div class="card-body">

                @if(Session::has('message_success'))
                    <div class="alert alert-dismissible bg-success text-white border-0 fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('message_success') }}
                    </div>
                @endif

                @if(Session::has('message_error'))
                    <div class="alert alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('message_error') }}
                    </div>
                @endif

                <a href="#" class="btn btn-light btn-block">
                    <span class="fab fa-google mr-2"></span>
                    Continua con Google
                </a>

                <div class="g-signin2" data-theme="dark" data-onsuccess="onSignIn" data-width="300" data-longtitle="true" style="text-align: -webkit-center;" data-route-google=""></div>

                <div class="page-separator">
                    <div class="page-separator__text">o</div>
                </div>

                <form action="{{ route('login') }}" novalidate method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Tu correo electrónico:</label>
                        <div class="input-group input-group-merge">
                            <input id="email" type="email" name="email" required="" class="form-control form-control-prepended" placeholder="Tu correo electrónico">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Tu contraseña:</label>
                        <div class="input-group input-group-merge">
                            <input id="password" type="password" name="password" required="" class="form-control form-control-prepended" placeholder="Tu contraseña">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-primary-ac btn-block btn-primary-ac">Entrar</button>
                    </div>
                    <div class="text-center">
                        <a href="#" class="text-black-70" style="text-decoration: underline;">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-black-50">
                ¿No estás registrado aún? <a href="{{ route('register') }}">Registrate</a>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset('sitio/assets/vendor/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('sitio/assets/vendor/popper.min.js') }}"></script>
<script src="{{ asset('sitio/assets/vendor/bootstrap.min.js') }}"></script>
<!-- Perfect Scrollbar -->
<script src="{{ asset('sitio/assets/vendor/perfect-scrollbar.min.js') }}"></script>
<!-- MDK -->
<script src="{{ asset('sitio/assets/vendor/dom-factory.js') }}"></script>
<script src="{{ asset('sitio/assets/vendor/material-design-kit.js') }}"></script>
<!-- Google Platform
<script src="https://apis.google.com/js/platform.js" async defer></script>
-->
<!-- App JS -->
<script src="{{ asset('sitio/assets/js/app.js') }}"></script>
<!-- Highlight.js -->
<script src="{{ asset('sitio/assets/js/hljs.js') }}"></script>
<!-- App Settings (safe to remove) -->
<script src="{{ asset('sitio/assets/js/app-settings.js') }}"></script>
<!-- Page Specials Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Google Sesion -->
<script src="{{ asset('assets/js/sesion/google-sesion.js') }}"></script>

</body>

</html>
