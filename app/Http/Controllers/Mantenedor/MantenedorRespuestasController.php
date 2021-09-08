<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\estados;
use App\Models\preguntas;
use App\Models\respuestas;
use App\Models\vigencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

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
    //
    public function save(Request $request){

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
                $registro = new respuestas();
                $registro->tr_uuid = $uuid;
                $registro->tr_res_nombre = $data['nombre'];
                $registro->tr_res_descripcion = $data['descripcion'];
                $registro->tr_res_orden = '';
                $registro->tr_res_respuesta_correcta = '';
                $registro->tr_res_usuario_creacion = 1;
                $registro->tr_res_usuario_modificacion = null;
                $registro->tr_res_fecha_creacion = date('Y-m-d H:i:s');
                $registro->tr_res_fecha_modificaion = null;
                $registro->tr_res_preg_fk = '';
                $registro->tr_res_est_fk = $data['estado'];
                $registro->tr_res_vig_fk = $data['vigencia'];
                $result = $registro->save();

                if ($result) {
                    $resp = respuestas::select('tr_uuid')->where('tr_uuid',$uuid)->get();
                    return Response::JSON([
                            "respuesta" => true,
                            "id" => $resp[0]['tr_uuid'],
                            "msg" => "Guardado Exitosamente !!"]
                        , 200);
                } else {
                    return Response::JSON([
                            "error" => true]
                        , 401);
                }
            }else  {
                $resp_upt = respuestas::where('tr_uuid','=',$data['uuid'])->update([
                    "tr_preg_nombre" => $data['nombre'],
                    "tr_preg_descripcion" => $data['descripcion'],
                    "tr_preg_tipo_pregunta" => $data['tipo'],
                    "tr_preg_est_fk" => $data['estado'],
                    "tr_preg_vig_fk" => $data['vigencia']
                ]);
                if($resp_upt) {
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
        $resp = respuestas::where('tr_uuid',$data)->get();
        $lstVigencias = vigencias::all();
        $lstCategorias = categorias::all();

        return Response::JSON([
                "respuesta" => true,
                "uuid" => $data,
                "id" => $resp[0]['tr_preg_id'],
                "nombre" => $resp[0]['tr_preg_nombre'],
                "descripcion" => $resp[0]['tr_preg_descripcion'],
                "vigencia" => $lstVigencias[($resp[0]['tr_preg_vig_fk'])-1]->tr_vig_nombre,
                "vigenciaId" => $resp[0]['tr_preg_vig_fk'],
                "msg" => "Actualizacion Exitosamente !!"]
            , 200);
    }
}
