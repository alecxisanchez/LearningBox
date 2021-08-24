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

class MantenedorModulosController extends Controller
{
    //
    public function index(){

        $lstCategorias = categorias::all();
        $lstCursos = cursos::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.modulos.index')
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
                "curso" => $items->tr_cur_nombre,
                "unidad" => $items->tr_und_nombre,
                "vigencia" => $lstVigencias[($items->tr_cur_vig_fk)-1]->tr_vig_nombre,
                "accion" =>''
            );
        }
        return Response::json($array);
    }
    //
    public function search_categoria(Request $request){

        $data = $request->input();
        $sql = "SELECT tr_cur_id
		                ,tr_cur_nombre
		                ,tr_cur_descripcion
                FROM cursos
                    WHERE tr_cur_cat_fk =" . $data['id'];

        $consulta = DB::select($sql);
        if( count($consulta) > 0 ) {
            return Response::JSON([
                    "respuesta" => true,
                    "data" => $consulta,
                    "msg" => "Consulta Exitosa !!"]
                , 200);
        }
    }
}
