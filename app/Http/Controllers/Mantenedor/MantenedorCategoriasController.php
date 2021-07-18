<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\categorias;
use App\Models\estados;
use App\Models\vigencias;
use Illuminate\Support\Facades\Response;
use Ramsey\Uuid\Uuid;
use App\Constantes\Constante;


class MantenedorCategoriasController extends Controller
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
                $registro = new categorias();
                $registro->tr_uuid = $uuid;
                $registro->tr_cat_nombre = $data['nombre'];
                $registro->tr_cat_descripcion = $data['descripcion'];
                $registro->tr_cat_usuario_creacion = 1;
                $registro->tr_cat_usuario_modificacion = null;
                $registro->tr_cat_fecha_creacion = date('Y-m-d H:i:s');
                $registro->tr_cat_fecha_modificacion = null;
                $registro->tr_cat_est_fk = $data['estado'];
                $registro->tr_cat_vig_fk = $data['vigencia'];
                $result = $registro->save();

                if ($result) {
                    $cat = categorias::select('tr_uuid')->where('tr_uuid',$uuid)->get();
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
                $cat_upt = categorias::where('tr_uuid','=',$data['uuid'])
                                    ->update(["tr_cat_nombre" => $data['nombre'],
                                            "tr_cat_descripcion" => $data['descripcion'],
                                            "tr_cat_est_fk" => $data['estado'],
                                            "tr_cat_vig_fk" => $data['vigencia']]);
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
    //
    public function refesh(Request $request){

        $data = $request->input('id');
        $cat = categorias::where('tr_uuid',$data)->get();
        $lstVigencias = vigencias::all();

        return Response::JSON([
                "respuesta" => true,
                "uuid" => $data,
                "id" => $cat[0]['tr_cat_id'],
                "nombre" => $cat[0]['tr_cat_nombre'],
                "descripcion" => $cat[0]['tr_cat_descripcion'],
                "vigencia" => $lstVigencias[($cat[0]['tr_cat_vig_fk'])-1]->tr_vig_nombre,
                "vigenciaId" => $cat[0]['tr_cat_vig_fk'],
                "msg" => "Actualizacion Exitosamente !!"]
            , 200);
    }
    //
    public function changer(Request $request){

        $data = $request->input('uuid');
        $consulta_cat = categorias::where('tr_uuid','=',$data)->get();
        $lstVigencias = vigencias::all();
        $cat_update = categorias::where('tr_uuid','=',$data);
        $resul_up = $cat_update->update(['tr_cat_vig_fk' => ($consulta_cat[0]->tr_cat_vig_fk == 1) ? 2 : 1]);
        $consulta_cat_upt = categorias::where('tr_uuid','=',$data)->get();
        if($resul_up) {
            return Response::JSON([
                    "respuesta" => true,
                    "id" => $consulta_cat[0]['tr_cat_id'],
                    "uuid" => $consulta_cat[0]['tr_uuid'],
                    "nombre" => $consulta_cat[0]['tr_cat_nombre'],
                    "descripcion" => $consulta_cat[0]['tr_cat_descripcion'],
                    "vigencia" => $lstVigencias[($consulta_cat_upt[0]['tr_cat_vig_fk'])-1]->tr_vig_nombre,
                    "vigenciaId" => $consulta_cat[0]['tr_cat_vig_fk'],
                    "msg" => "Actualizacion Exitosamente !!"]
                , 200);
        }

    }
    //
    public function search(Request $request){

        $data = $request->input('uuid');
        $consulta_cat = categorias::where('tr_uuid','=',$data)->get();
        $lstVigencias = vigencias::all();
        if( count($consulta_cat) > 0 ) {
            return Response::JSON([
                    "respuesta" => true,
                    "id" => $consulta_cat[0]['tr_cat_id'],
                    "uuid" => $consulta_cat[0]['tr_uuid'],
                    "nombre" => $consulta_cat[0]['tr_cat_nombre'],
                    "descripcion" => $consulta_cat[0]['tr_cat_descripcion'],
                    "vigencia" => $lstVigencias[($consulta_cat[0]['tr_cat_vig_fk'])-1]->tr_vig_nombre,
                    "vigenciaId" => $consulta_cat[0]['tr_cat_vig_fk'],
                    "estadoId" => $consulta_cat[0]['tr_cat_est_fk'],
                    "msg" => "Consulta Exitosa !!"]
                , 200);
        }
    }
}
