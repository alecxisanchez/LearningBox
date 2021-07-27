<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\estados;
use App\Models\usuarios;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MantenedorUsuariosController extends Controller
{
    //
    public function index(){

        $lstUsuarios = usuarios::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.usuarios.index')
            ->with('lstUsuarios',$lstUsuarios)
            ->with('lstEstados',$lstEstados)
            ->with('lstVigencias',$lstVigencias);

    }
}
