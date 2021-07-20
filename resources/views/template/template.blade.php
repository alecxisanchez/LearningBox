<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LearningBox | {{ $title ?? 'Dashboard' }}</title>

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
    <!-- Page Specials Styles -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body class=" layout-fluid">

<div class="preloader">
    <div class="sk-chase">
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
    </div>
</div>

<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">
    @include('template.layout.header')
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">
        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">
                <div class="container-fluid page__container">
                    @yield('content')
                </div>
            </div>
            {{--LLamar al menu si es Administrador o Estudiante--}}
            @include('template.layout.sidebar_Admin')
            {{--@include('template.layout.sidebar_Estud')--}}
        </div>
    </div>
</div>
<!-- App modals -->
@stack('modals')
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
<!-- Page Specials Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@stack('scripts')

</body>

</html>
