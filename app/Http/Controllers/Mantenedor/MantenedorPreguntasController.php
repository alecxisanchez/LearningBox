<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\estados;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MantenedorPreguntasController extends Controller
{
    //
    public function index(){
        $lstCategorias = categorias::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();
        return View::make('mantenedores.categorias.agregar')
            ->with('lstCategorias',$lstCategorias)
            ->with('lstEstados',$lstEstados)
            ->with('lstVigencias',$lstVigencias);
    }
}
