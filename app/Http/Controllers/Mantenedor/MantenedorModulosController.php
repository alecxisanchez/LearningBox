<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\cursos;
use App\Models\estados;
use App\Models\modulos;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use SebastianBergmann\CodeCoverage\Driver\Selector;

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

        $sql = "SELECT
                    A.tr_mod_id
                    ,A.tr_uuid
                    ,A.tr_mod_nombre
                    ,A.tr_mod_descripcion
                    ,A.tr_mod_vig_fk
                FROM modulos A
                WHERE A.tr_mod_cur_fk = 1";

        $consulta = DB::select($sql);

        foreach( $consulta as $key => $items ){

            $array[] = array(
                "numero" => $key + 1,
                "uuid" => $items->tr_uuid,
                "nombre" => $items->tr_mod_nombre,
                "descripcion" => $items->tr_mod_descripcion,
                "vigencia" => $lstVigencias[($items->tr_mod_vig_fk)-1]->tr_vig_nombre,
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
    //
    public function search(Request $request){

        $data = $request->input('uuid');
        $consulta_mod = modulos::where('tr_uuid','=',$data)->get();
        $sql_categoria = "SELECT A.tr_cat_id
		                        , A.tr_cat_nombre
                            FROM categorias A WHERE ( A.tr_cat_id = (
							                    		SELECT B.tr_cur_cat_fk FROM cursos B WHERE B.tr_cur_cat_fk = (
										                SELECT C.tr_mod_cur_fk FROM modulos C
											                WHERE (C.tr_uuid = '". $data ."')
		                            )
	                            )
                            )";
        $categoria = db::select($sql_categoria);
        $lstVigencias = vigencias::all();
        if( count($consulta_mod) > 0 ) {
            return Response::JSON([
                    "respuesta" => true,
                    "id" => $consulta_mod[0]['tr_mod_id'],
                    "uuid" => $consulta_mod[0]['tr_uuid'],
                    "categoria" => $categoria[0]->tr_cat_id,
                    "nombre" => $consulta_mod[0]['tr_mod_nombre'],
                    "descripcion" => $consulta_mod[0]['tr_mod_descripcion'],
                    "vigencia" => $lstVigencias[($consulta_mod[0]['tr_mod_vig_fk'])-1]->tr_vig_nombre,
                    "vigenciaId" => $consulta_mod[0]['tr_mod_vig_fk'],
                    "estadoId" => $consulta_mod[0]['tr_mod_est_fk'],
                    "msg" => "Consulta Exitosa !!"]
                , 200);
        }
    }
}
