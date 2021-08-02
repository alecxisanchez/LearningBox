<!-- start: Sidebar -->
<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content ">
        <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
            <div class="sidebar-p-y">
                <!-- Account menu -->
                <div class="sidebar-heading">Cuenta</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#account_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i>
                            Perfil
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu sm-indent collapse show" id="account_menu">
                            <li class="sidebar-menu-item active">
                            @auth
                                <a class="sidebar-menu-button" href="{{ route('usuarios.edit', ['usuario' => \Auth::user()->tr_usu_id]) }}">
                                    <span class="sidebar-menu-text">Editar Cuenta</span>
                                </a>
                            @endauth
                            @guest
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Editar Cuenta</span>
                                </a>
                            @endguest
                            </li>
                            <li class="sidebar-menu-item">
                            @auth
                                <a class="sidebar-menu-button" href="{{ route('usuarios.edit', ['usuario' => \Auth::user()->tr_usu_id]) }}">
                                    <span class="sidebar-menu-text">Cambio de Clave</span>
                                </a>
                            @endauth
                            @guest
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Cambio de Clave</span>
                                </a>
                            @endguest
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('logout') }}">
                                    <span class="sidebar-menu-text">Cerrar Sesion</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="sidebar-heading">Mantenedores</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button sidebar-js-collapse"
                           data-toggle="collapse"
                           href="#components_menu">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">folder</i>
                            CRUD Componentes
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu sm-indent collapse"
                            id="components_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('usu_index') }}">
                                    <span class="sidebar-menu-text">Usuarios</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('rol_index') }}">
                                    <span class="sidebar-menu-text">Roles</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('per_index') }}">
                                    <span class="sidebar-menu-text">Permisos</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button"
                                   href="{{ route('cat_index') }}">
                                    <span class="sidebar-menu-text">Categorias</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('cur_index') }}">
                                    <span class="sidebar-menu-text">Cursos</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('mod_index') }}">
                                    <span class="sidebar-menu-text">Modulos</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('und_index') }}">
                                    <span class="sidebar-menu-text">Unidades</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('qui_index') }}">
                                    <span class="sidebar-menu-text">Quiz</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('pre_index') }}">
                                    <span class="sidebar-menu-text">Preguntas</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="ui-badges.html">
                                    <span class="sidebar-menu-text">Respuestas</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="ui-progress.html">
                                    <span class="sidebar-menu-text">Archivos</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="ui-pagination.html">
                                    <span class="sidebar-menu-text">Configuracion</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="ui-pagination.html">
                                    <span class="sidebar-menu-text">Metodo Pago</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end: Sidebar -->
