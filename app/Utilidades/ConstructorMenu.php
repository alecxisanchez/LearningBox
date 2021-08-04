<?php

namespace App\Utilidades;

use Illuminate\Support\Facades\Gate;

/**
 * Class ConstructorMenu
 *
 * @package App\Utilidades
 */
class ConstructorMenu
{
    /**
     * Items menu
     *
     * @param array $menus Menu items
     * @return null|string
     */
    public static function itemsMenu($menus)
    {
        $menu = null;
        \Log::debug('ConstructorMenu', ['menus' => $menus]);
        foreach ($menus as $item) {
            //if (Gate::allows('access', $item->permisos)) {
                $menu .= sprintf(
                    '<div class="sidebar-heading">%s</div>',
                    $item->texto
                );
                if (isset($item->subMenu)) {
                    if (count((array)$item->subMenu) > 0) {
                        $menu .= '<ul class="sidebar-menu">';
                        foreach ($item->subMenu as $itemSub) {
                            $menu .= sprintf(
                                '<li class="sidebar-menu-item open">
                                    <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#%s">',
                                $itemSub->ruta
                            );
                            $menu .= sprintf(
                                '<i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">%s</i>',
                                $itemSub->icono
                            );
                            $menu .= sprintf(
                                '%s<span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>',
                                $itemSub->texto
                            );
                            if (isset($itemSub->subMenu)) {
                                if (count((array)$itemSub->subMenu) > 0) {
                                    $menu .= sprintf(
                                        '<ul class="sidebar-submenu sm-indent collapse show" id="%s">',
                                        $itemSub->ruta
                                    );
                                    foreach ($itemSub->subMenu as $itemSubSub) {
                                        $menu .= sprintf(
                                            '<li class="sidebar-menu-item %s">
                                                <a class="sidebar-menu-button" href="%s">
                                                    <span class="sidebar-menu-text">%s</span>
                                                </a>
                                            </li>',
                                            active($itemSubSub->ruta),
                                            $itemSubSub->ruta,
                                            $itemSubSub->texto
                                        );
                                    }
                                    $menu .= '</ul>';
                                }
                            }
                            $menu .= '</li>';
                        }
                        $menu .= '</ul>';
                    }
                }
            //}
        }

        return $menu;
    }

    /**
     * Construcción de Menú
     *
     * @return null|string
     */
    public static function buildMenu()
    {
        $menus = menu();

        return self::itemsMenu($menus);
    }

}
