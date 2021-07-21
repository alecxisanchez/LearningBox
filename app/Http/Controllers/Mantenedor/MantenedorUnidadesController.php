<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\cursos;
use App\Models\estados;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class MantenedorUnidadesController extends Controller
{
    //
    public function index(){

        $lstCategorias = categorias::all();
        $lstCursos = cursos::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.unidades.index')
            ->with('lstCategorias',$lstCategorias)
            ->with('lstEstados',$lstEstados)
            ->with('lstCursos',$lstCursos)
            ->with('lstVigencias',$lstVigencias);

    }
    //
    public function filter(Request $request){

        $array = [];
        $data = $request->input();
        $lstVigencias = vigencias::all();

        $sql = "SELECT A.tr_cur_nombre
                        ,A.tr_cur_descripcion
                        ,B.tr_cat_nombre
                        ,A.tr_cur_vig_fk
                FROM cursos A
                    JOIN categorias B
                        ON ( A.tr_cur_cat_fk = B.tr_cat_id )
                WHERE A.tr_cur_cat_fk =" . $data['id'];

        $consulta = DB::select($sql);

        foreach( $consulta as $key => $items ){

            $array[] = array(
                "numero" => $key + 1,
                "nombre" => $items->tr_cur_nombre,
                "descripcion" => $items->tr_cur_descripcion,
                "categoria" => $items->tr_cat_nombre,
                "vigencia" => $lstVigencias[($items->tr_cur_vig_fk)-1]->tr_vig_nombre,
                "accion" =>''
            );

        }

        return Response::json($array);

    }
}
