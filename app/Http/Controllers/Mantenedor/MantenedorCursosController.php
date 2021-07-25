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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

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

        $array = [];
        $data = $request->input();
        $lstVigencias = vigencias::all();

        $sql = "SELECT A.tr_uuid
                        ,A.tr_cur_nombre
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
                "uuid" => $items->tr_uuid,
                "nombre" => $items->tr_cur_nombre,
                "descripcion" => $items->tr_cur_descripcion,
                "categoria" => $items->tr_cat_nombre,
                "vigencia" => $lstVigencias[($items->tr_cur_vig_fk)-1]->tr_vig_nombre,
                "accion" =>''
            );

        }

        return Response::json($array);

    }
    //
    public function search(Request $request){

        $data = $request->input('uuid');
        $consulta_cur = cursos::where('tr_uuid','=',$data)->get();
        $lstVigencias = vigencias::all();
        if( count($consulta_cur) > 0 ) {
            return Response::JSON([
                    "respuesta" => true,
                    "id" => $consulta_cur[0]['tr_cur_id'],
                    "uuid" => $consulta_cur[0]['tr_uuid'],
                    "categoria" => $consulta_cur[0]['tr_cur_cat_fk'],
                    "nombre" => $consulta_cur[0]['tr_cur_nombre'],
                    "descripcion" => $consulta_cur[0]['tr_cur_descripcion'],
                    "vigencia" => $lstVigencias[($consulta_cur[0]['tr_cur_vig_fk'])-1]->tr_vig_nombre,
                    "vigenciaId" => $consulta_cur[0]['tr_cur_vig_fk'],
                    "estadoId" => $consulta_cur[0]['tr_cur_est_fk'],
                    "msg" => "Consulta Exitosa !!"]
                , 200);
        }
    }
    //
    public function save(Request $request){

        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();
        $rules = [
            'categoria' => 'required',
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
                $registro = new cursos();
                $registro->tr_uuid = $uuid;
                $registro->tr_cur_nombre = $data['nombre'];
                $registro->tr_cur_descripcion = $data['descripcion'];
                $registro->tr_cur_usuario_creacion = 1;
                $registro->tr_cur_usuario_modificacion = null;
                $registro->tr_cur_fecha_creacion = date('Y-m-d H:i:s');
                $registro->tr_cur_fecha_modificacion = null;
                $registro->tr_cur_cat_fk = $data['categoria'];
                $registro->tr_cur_est_fk = $data['estado'];
                $registro->tr_cur_vig_fk = $data['vigencia'];
                $result = $registro->save();

                if ($result) {
                    $cur = cursos::select('tr_uuid')->where('tr_uuid',$uuid)->get();
                    return Response::JSON([
                            "respuesta" => true,
                            "id" => $cur[0]['tr_uuid'],
                            "msg" => "Guardado Exitosamente !!"]
                        , 200);
                } else {
                    return Response::JSON([
                            "error" => true]
                        , 401);
                }
            }else  {
                $cur_upt = cursos::where('tr_uuid','=',$data['uuid'])
                    ->update(["tr_cur_nombre" => $data['nombre'],
                        "tr_cur_descripcion" => $data['descripcion'],
                        "tr_cur_cat_fk" => $data['categoria'],
                        "tr_cur_est_fk" => $data['estado'],
                        "tr_cur_vig_fk" => $data['vigencia']]);
                if($cur_upt) {
                    return Response::JSON([
                            "respuesta" => true,
                            "id" => $data['uuid'],
                            "msg" => "Editado Exitosamente !!"]
                        , 200);
                }
            }
        }
    }
    //
    public function refesh(Request $request){

        $data = $request->input('id');
        $cur = cursos::where('tr_uuid',$data)->get();
        $lstVigencias = vigencias::all();
        $lstCategorias = categorias::all();

        return Response::JSON([
                "respuesta" => true,
                "uuid" => $data,
                "id" => $cur[0]['tr_cur_id'],
                "nombre" => $cur[0]['tr_cur_nombre'],
                "descripcion" => $cur[0]['tr_cur_descripcion'],
                "categoria" => $lstCategorias[($cur[0]['tr_cur_cat_fk'])-1]->tr_cat_nombre,
                "vigencia" => $lstVigencias[($cur[0]['tr_cur_vig_fk'])-1]->tr_vig_nombre,
                "vigenciaId" => $cur[0]['tr_cat_vig_fk'],
                "msg" => "Actualizacion Exitosamente !!"]
            , 200);
    }
}
