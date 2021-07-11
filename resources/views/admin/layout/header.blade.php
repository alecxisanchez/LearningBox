<!-- Header -->
<div id="header"
     data-fixed
     class="mdk-header js-mdk-header mb-0">
    <div class="mdk-header__content">

        <!-- Navbar -->
        <nav id="default-navbar"
             class="navbar navbar-expand navbar-dark bg-primary m-0">
            <div class="container-fluid">
                <!-- Toggle sidebar -->
                <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                    <span class="material-icons">menu</span>
                </button>

                <!-- Brand -->
                <a href="#" class="navbar-brand">
                    <img src="{{ asset('admin/assets/images/logo/white.svg') }}" class="mr-2" alt="LearningBox" />
                    <span class="d-none d-xs-md-block">LearningBox</span>
                </a>

                <!-- Search -->
                <form class="search-form d-none d-md-flex">
                    <input type="text" class="form-control" placeholder="Buscar">
                    <button class="btn" type="button"><i class="material-icons font-size-24pt">search</i></button>
                </form>
                <!-- // END Search -->

                <div class="flex"></div>

                <!-- Menu -->
                <ul class="nav navbar-nav flex-nowrap">

                    <li class="nav-item d-none d-md-flex">
                        <a href="#" class="nav-link">
                            <i class="material-icons">shopping_cart</i>
                        </a>
                    </li>

                    <!-- Notifications dropdown -->
                    <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                        <button class="nav-link btn-flush dropdown-toggle"
                                type="button"
                                data-toggle="dropdown"
                                data-dropdown-disable-document-scroll
                                data-caret="false">
                            <i class="material-icons">notifications</i>
                            <span class="badge badge-notifications badge-danger">1</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div data-perfect-scrollbar
                                 class="position-relative">
                                <div class="dropdown-header"><strong>MENSAJES</strong></div>
                                <div class="list-group list-group-flush mb-0">
                                    <a href="#" class="list-group-item list-group-item-action unread">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-muted">hace 5 minutos</small>
                                            <span class="ml-auto unread-indicator bg-primary"></span>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <img src="{{ asset('admin/assets/images/people/110/woman-5.jpg') }}" alt="people" class="avatar-img rounded-circle">
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong>Michelle</strong>
                                                <span class="text-black-70">🔥 Excelente trabajo..</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                <div class="dropdown-header"><strong>NOTIFICACIONES</strong></div>
                                <div class="list-group list-group-flush mb-0">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-muted">hace 5 horas</small>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i class="material-icons font-size-16pt text-success">group_add</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong>Adrian. D</strong>
                                                <span class="text-black-70">Te falta el test de la unidad 2.</span>
                                            </span>
                                        </span>
                                    </a>

                                    <a href="#" class="list-group-item list-group-item-action">
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-muted">hace 1 día</small>
                                        </span>
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle bg-light">
                                                    <i class="material-icons font-size-16pt text-warning">storage</i>
                                                </span>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <span class="text-black-70">Te fue excelente en la unidad 1.</span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- // END Notifications dropdown -->
                    <!-- User dropdown -->
                    <li class="nav-item dropdown ml-1 ml-md-3">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                            <img src="{{ asset('admin/assets/images/people/50/guy-6.jpg') }}" alt="Avatar" class="rounded-circle" width="40"></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="material-icons">edit</i> Editar datos
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="material-icons">person</i> Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="material-icons">lock</i> Cerrar sesión
                            </a>
                        </div>
                    </li>
                    <!-- // END User dropdown -->

                </ul>
                <!-- // END Menu -->
            </div>
        </nav>
        <!-- // END Navbar -->

    </div>
</div>
<!-- // END Header -->
