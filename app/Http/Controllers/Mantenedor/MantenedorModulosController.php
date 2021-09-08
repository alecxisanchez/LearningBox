<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\cursos;
use App\Models\estados;
use App\Models\modulos;
use App\Models\vigencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;
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
                WHERE A.tr_mod_cur_fk = " . $data['id_cur'];

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
    //
    public function save(Request $request){

        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();
        $rules = [
            'nombre' => 'required|string|min:3|max:255',
            'descripcion' => 'required|string|min:3|max:255',
            'vigencia' => 'required',
            'estado' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

        }else {
            $data = $request->input();
            if( $data['banderaAccion'] == 'Save' ) {
                $uuid = Uuid::uuid4();
                $registro = new modulos();
                $registro->tr_uuid = $uuid;
                $registro->tr_mod_nombre = $data['nombre'];
                $registro->tr_mod_descripcion = $data['descripcion'];
                $registro->tr_mod_usuario_creacion = 1;
                $registro->tr_mod_usuario_modificacion = null;
                $registro->tr_mod_fecha_creacion = date('Y-m-d H:i:s');
                $registro->tr_mod_fecha_modificaion = null;
                $registro->tr_mod_cur_fk = $data[''];
                $registro->tr_mod_est_fk = $data['estado'];
                $registro->tr_mod_vig_fk = $data['vigencia'];
                $result = $registro->save();

                if ($result) {
                    $cat = modulos::select('tr_uuid')->where('tr_uuid',$uuid)->get();
                    //Log::info('id_uuid Generado: '.$cat[0]['tr_uuid']);
                    return Response::JSON([
                            "respuesta" => true,
                            "id" => $cat[0]['tr_uuid'],
                            "msg" => "Guardado Exitosamente !!"]
                        , 200);
                } else {
                    return Response::JSON([
                            "error" => true]
                        , 401);
                }
            }else  {
                $cat_upt = modulos::where('tr_uuid','=',$data['uuid'])
                    ->update(["tr_mod_nombre" => $data['nombre'],
                        "tr_mod_descripcion" => $data['descripcion'],
                        "tr_mod_cur_fk" => $data['descripcion'],
                        "tr_mod_est_fk" => $data['estado'],
                        "tr_mod_vig_fk" => $data['vigencia']]);
                if($cat_upt) {
                    return Response::JSON([
                            "respuesta" => true,
                            "id" => $data['uuid'],
                            "msg" => "Editado Exitosamente !!"]
                        , 200);
                }
            }
        }
    }
}
