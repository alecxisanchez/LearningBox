<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\cursos;
use App\Models\estados;
use App\Models\preguntas;
use App\Models\vigencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

class MantenedorPreguntasController extends Controller
{
    //
    public function index(){
        $lstPreguntas = preguntas::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();
        return View::make('mantenedores.preguntas.index')
            ->with('lstPreguntas',$lstPreguntas)
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
                $registro = new preguntas();
                $registro->tr_uuid = $uuid;
                $registro->tr_preg_nombre = $data['nombre'];
                $registro->tr_preg_descripcion = $data['descripcion'];
                $registro->tr_preg_tipo_pregunta = $data['tipo'];
                $registro->tr_preg_usuario_creacion = 1;
                $registro->tr_preg_usuario_modificacion = null;
                $registro->tr_preg_fecha_creacion = date('Y-m-d H:i:s');
                $registro->tr_preg_fecha_modificaion = null;
                $registro->tr_preg_est_fk = $data['estado'];
                $registro->tr_preg_vig_fk = $data['vigencia'];
                $result = $registro->save();

                if ($result) {
                    $preg = preguntas::select('tr_uuid')->where('tr_uuid',$uuid)->get();
                    return Response::JSON([
                            "respuesta" => true,
                            "id" => $preg[0]['tr_uuid'],
                            "msg" => "Guardado Exitosamente !!"]
                        , 200);
                } else {
                    return Response::JSON([
                            "error" => true]
                        , 401);
                }
            }else  {
                $preg_upt = preguntas::where('tr_uuid','=',$data['uuid'])->update([
                                        "tr_preg_nombre" => $data['nombre'],
                                        "tr_preg_descripcion" => $data['descripcion'],
                                        "tr_preg_tipo_pregunta" => $data['tipo'],
                                        "tr_preg_est_fk" => $data['estado'],
                                        "tr_preg_vig_fk" => $data['vigencia']
                                        ]);
                if($preg_upt) {
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
        $preg = preguntas::where('tr_uuid',$data)->get();
        $lstVigencias = vigencias::all();

        return Response::JSON([
                "respuesta" => true,
                "uuid" => $data,
                "id" => $preg[0]['tr_preg_id'],
                "nombre" => $preg[0]['tr_preg_nombre'],
                "descripcion" => $preg[0]['tr_preg_descripcion'],
                "vigencia" => $lstVigencias[($preg[0]['tr_preg_vig_fk'])-1]->tr_vig_nombre,
                "vigenciaId" => $preg[0]['tr_preg_vig_fk'],
                "msg" => "Actualizacion Exitosamente !!"]
            , 200);
    }
    //
    public function search(Request $request){

        $data = $request->input('uuid');
        $consulta_preg = preguntas::where('tr_uuid','=',$data)->get();
        $lstVigencias = vigencias::all();
        if( count($consulta_preg) > 0 ) {
            return Response::JSON([
                    "respuesta" => true,
                    "id" => $consulta_preg[0]['tr_preg_id'],
                    "uuid" => $consulta_preg[0]['tr_uuid'],
                    "nombre" => $consulta_preg[0]['tr_preg_nombre'],
                    "descripcion" => $consulta_preg[0]['tr_preg_descripcion'],
                    "vigencia" => $lstVigencias[($consulta_preg[0]['tr_preg_vig_fk'])-1]->tr_vig_nombre,
                    "tipo" => $consulta_preg[0]['tr_preg_tipo_pregunta'],
                    "vigenciaId" => $consulta_preg[0]['tr_preg_vig_fk'],
                    "estadoId" => $consulta_preg[0]['tr_preg_est_fk'],
                    "msg" => "Consulta Exitosa !!"]
                , 200);
        }
    }
}
