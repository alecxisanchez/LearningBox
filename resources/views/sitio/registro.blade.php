<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LearningBox | Registrar cuenta</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

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

</head>

<body class="login">

<div class="d-flex align-items-center"
     style="min-height: 100vh">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto"
         style="min-width: 300px;">
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
                <h4 class="card-title">Registrarme</h4>
                <p class="card-subtitle">Crea una nueva cuenta</p>
            </div>
            <div class="card-body">

                <a href="#" class="btn btn-light btn-block">
                    <span class="fab fa-google mr-2"></span>
                    Continuar con Google
                </a>

                <div class="page-separator">
                    <div class="page-separator__text">o</div>
                </div>

                <form action="{{ route('usuarios.store') }}" novalidate method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Nombre:</label>
                        <div class="input-group input-group-merge">
                            <input id="name" name="name" type="text" required="" class="form-control form-control-prepended" placeholder="Nombre Completo">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Tu correo electrónico:</label>
                        <div class="input-group input-group-merge">
                            <input id="email" name="email" type="email" required="" class="form-control form-control-prepended" placeholder="Tu correo electrónico">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Contraseña:</label>
                        <div class="input-group input-group-merge">
                            <input id="password" name="password" type="password" required="" class="form-control form-control-prepended" placeholder="Tu contraseña">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Confirma contraseña:</label>
                        <div class="input-group input-group-merge">
                            <input id="password_confirmation" name="password_confirmation" type="password" required="" class="form-control form-control-prepended" placeholder="Confirma tu contraseña">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Registrarme</button>
                    <div class="form-group text-center mb-0">
                        <div class="custom-control custom-checkbox">
                            <input id="terms" type="checkbox" class="custom-control-input" checked required="">
                            <label for="terms" class="custom-control-label text-black-70">Acepto los <a href="#" class="text-black-70" style="text-decoration: underline;">Terminos de uso</a></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-black-50">¿Ya estás registrado? <a href="{{ route('login') }}">Inicia Sesión</a></div>
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
<!-- App JS -->
<script src="{{ asset('sitio/assets/js/app.js') }}"></script>
<!-- Highlight.js -->
<script src="{{ asset('sitio/assets/js/hljs.js') }}"></script>
<!-- App Settings (safe to remove) -->
<script src="{{ asset('sitio/assets/js/app-settings.js') }}"></script>

</body>

</html>
