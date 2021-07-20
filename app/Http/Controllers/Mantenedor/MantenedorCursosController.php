<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\cursos;
use App\Models\estados;
use App\Models\vigencias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MantenedorCursosController extends Controller
{
    //
    public function index(){

        $lstCategorias = categorias::all();
        $lstCursos = cursos::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.cursos.index')
            ->with('lstCategorias',$lstCategorias)
            ->with('lstEstados',$lstEstados)
            ->with('lstCursos',$lstCursos)
            ->with('lstVigencias',$lstVigencias);

    }
    //
    public function filter(Request $request){
        //$sql = "";
        //$consulta = DB::select($sql);
        $array[] = array(
            "numero" => 1,
            "nombre" => 2,
            "descripcion" => 3,
            "categoria" => 4,
            "vigencia" => 5,
            "accion" => 6
        );

        return Response::json($array);

    }
}
