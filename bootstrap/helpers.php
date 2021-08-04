<?php

use App\Constantes\ConsPermisos;

if (!function_exists('active')) {
    /**
     * Activación de menú para modulos específicos
     *
     * @param $route
     * @return string
     */
    function active($route)
    {
        if (!is_null($route)) {
            if ($route == \Request::url()) {
                return 'active open';
            }
        }
        return $route;
    }
}

if (!function_exists('menu')) {

    /**
     * Construcción de datos del menú
     *
     * @return string
     */
    function menu()
    {
        $menu = [
            'Cuenta' => [
                'texto' => 'Cuenta',
                'ruta' => null,
                'icono' => null,
                'permisos' => [ConsPermisos::$mod_cuenta],
                'subMenu' => [
                    'Perfil' => [
                        'texto' => 'Perfil',
                        'ruta' => 'account_menu',
                        'icono' => 'account_box',
                        'permisos' => [ConsPermisos::$mod_perfil],
                        'subMenu' => [
                            'Editar Cuenta' => [
                                'texto' => 'Editar Cuenta',
                                'ruta' => route('usuarios.edit', ['usuario' => \Auth::user()->tr_usu_id]),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_editar_cuenta],
                                'subMenu' => [],
                            ],
                            'Cambio de Clave' => [
                                'texto' => 'Cambio de Clave',
                                'ruta' => route('usuarios.edit', ['usuario' => \Auth::user()->tr_usu_id]),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_editar_cuenta, ConsPermisos::$mod_cambio_clave],
                                'subMenu' => [],
                            ],
                            'Cerrar Sesión' => [
                                'texto' => 'Cerrar Sesión',
                                'ruta' => route('logout'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_sesion],
                                'subMenu' => [],
                            ]
                        ],
                    ],
                ],
            ],
            'Mantenedores' => [
                'texto' => 'Mantenedores',
                'ruta' => null,
                'icono' => null,
                'permisos' => [ConsPermisos::$mod_mantenedores],
                'subMenu' => [
                    'Modelos' => [
                        'texto' => 'Modelos',
                        'ruta' => 'components_menu',
                        'icono' => 'folder',
                        'permisos' => [ConsPermisos::$mod_modelos],
                        'subMenu' => [
                            'Usuarios' => [
                                'texto' => 'Usuarios',
                                'ruta' => route('usu_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_usuarios],
                                'subMenu' => [],
                            ],
                            'Roles' => [
                                'texto' => 'Roles',
                                'ruta' => route('rol_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_roles],
                                'subMenu' => [],
                            ],
                            'Permisos' => [
                                'texto' => 'Permisos',
                                'ruta' => route('per_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_permisos],
                                'subMenu' => [],
                            ],
                            'Categorías' => [
                                'texto' => 'Categorías',
                                'ruta' => route('cat_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_categorias],
                                'subMenu' => [],
                            ],
                            'Cursos' => [
                                'texto' => 'Cursos',
                                'ruta' => route('cur_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_cursos],
                                'subMenu' => [],
                            ],
                            'Modulos' => [
                                'texto' => 'Modulos',
                                'ruta' => route('mod_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_modulos],
                                'subMenu' => [],
                            ],
                            'Unidades' => [
                                'texto' => 'Unidades',
                                'ruta' => route('und_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_unidades],
                                'subMenu' => [],
                            ],
                            'Quiz' => [
                                'texto' => 'Quiz',
                                'ruta' => route('qui_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_unidades],
                                'subMenu' => [],
                            ],
                            'Preguntas' => [
                                'texto' => 'Preguntas',
                                'ruta' => route('pre_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_unidades],
                                'subMenu' => [],
                            ],
                            'Respuestas' => [
                                'texto' => 'Respuestas',
                                'ruta' => route('pre_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_unidades],
                                'subMenu' => [],
                            ],
                            'Archivos' => [
                                'texto' => 'Archivos',
                                'ruta' => route('pre_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_unidades],
                                'subMenu' => [],
                            ],
                            'Configuración' => [
                                'texto' => 'Configuración',
                                'ruta' => route('pre_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_unidades],
                                'subMenu' => [],
                            ],
                            'Método de Pago' => [
                                'texto' => 'Método de Pago',
                                'ruta' => route('pre_index'),
                                'icono' => null,
                                'permisos' => [ConsPermisos::$mod_unidades],
                                'subMenu' => [],
                            ]
                        ],
                    ],
                ],
            ]
        ];

        return json_decode(json_encode($menu));
    }
}
