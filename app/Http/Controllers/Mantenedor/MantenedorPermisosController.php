<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\estados;
use App\Models\permisos;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MantenedorPermisosController extends Controller
{
    //
    public function index(){

        $lstPermisos = permisos::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.permisos.index')
            ->with('lstPermisos',$lstPermisos)
            ->with('lstEstados',$lstEstados)
            ->with('lstVigencias',$lstVigencias);
    }

}
