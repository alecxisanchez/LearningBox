<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\estados;
use App\Models\respuestas;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MantenedorRespuestasController extends Controller
{
    //
    public function index(){
        $lstRespuestas = respuestas::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();
        return View::make('mantenedores.respuestas.index')
            ->with('lstRespuestas',$lstRespuestas)
            ->with('lstEstados',$lstEstados)
            ->with('lstVigencias',$lstVigencias);
    }
}
