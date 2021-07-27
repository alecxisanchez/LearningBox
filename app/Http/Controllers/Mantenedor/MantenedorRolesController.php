<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\estados;
use App\Models\roles;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MantenedorRolesController extends Controller
{
    //
    public function index(){

        $lstRoles = roles::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.roles.index')
            ->with('lstRoles',$lstRoles)
            ->with('lstEstados',$lstEstados)
            ->with('lstVigencias',$lstVigencias);

    }
}
