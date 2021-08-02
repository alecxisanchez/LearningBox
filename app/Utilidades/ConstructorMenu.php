<?php

namespace App\Utilidades;

use App\Models\menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/**
 * Class ConstructorMenu
 *
 * @package App\Utilidades
 */
class ConstructorMenu
{
    /**
     * @var ID usuario
     */
    private $idUsuario;

    /**
     * ConstructorMenu constructor.
     */
    public function __construct()
    {
        if (Auth::check()) {
            $this->idUsuario = Auth::user()->id;
        } else {
            $this->idUsuario = null;
        }
    }

    public function getMenuPorUsuario()
    {
        $menu = menu::join('menu_permisos', 'menu.tr_men_id', 'menu_permisos.ti_men_per_men_fk')
            ->join('usuarios_permisos', 'menu_permisos.ti_men_per_per_fk', 'usuarios_permisos.ti_usu_per_per_fk')
            ->where('usuarios_permisos.ti_usu_per_usu_fk', $this->idUsuario)
            ->get();

        \Log::debug('ConstructorMenu.getMenuPorUsuario', ['ID' => $this->idUsuario, 'Menu' => $menu]);

        return $menu;
    }

    /**
     * Items menu
     *
     * @param array $menus Menu items
     * @return null|string
     */
    public static function itemsMenu($menus)
    {
        $menu = null;
        foreach ($menus as $item) {
            if (Gate::allows('access', $item->permission)) {
                $menu .= sprintf(
                    '<li class="nav-item" data-active="%s">',
                    active($item->route)
                );
                $menu .= sprintf(
                    '<a class="nav-link nav-toggle" href="%s">',
                    !is_null($item->route) ? route($item->route) : '#'
                );
                $menu .= sprintf(
                    '<i class="fa fa-%s"></i> ',
                    $item->icon
                );
                $menu .= sprintf(
                    '<span class="title">%s</span>',
                    $item->text
                );
                $menu .= '<span class="selected"></span>';

                if (isset($item->subMenu)) {
                    if (count($item->subMenu) > 0) {
                        $menu .= '<span class="fa arrow"></span>';
                    }
                }
                $menu .= '</a>';

                if (isset($item->subMenu)) {
                    if (count($item->subMenu) > 0) {
                        $menu .= '<ul class="sub-menu">';
                        $menu .= self::itemsMenu($item->subMenu);
                        $menu .= '</ul>';
                    }
                }
                $menu .= '</li>';
            }
        }
        return $menu;
    }

    /**
     * Build menu admin
     *
     * @return null|string
     */
    public static function buildMenu()
    {
        $menus = menu();
        $products = null;

        return self::itemsMenu($menus);
    }

}
