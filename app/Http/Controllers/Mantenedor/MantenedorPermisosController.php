<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\cursos;
use App\Models\estados;
use App\Models\permisos;
use App\Models\vigencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

class MantenedorPermisosController extends Controller
{
    //
    public function index(){

        $lstPermisos = permisos::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.permisos.index')
            ->with('lstPermisos',$lstPermisos)
            ->with('lstEstados',$lstEstados)
            ->with('lstVigencias',$lstVigencias);
    }
    //
    public function gettodos(){

        $lstPermisos = permisos::all();

        return Response::JSON([
                "respuesta" => true,
                "dta" => $lstPermisos,
                "msg" => "Ejecucion Exitosamente !!"]
            , 200);
    }
    //
    public function search(Request $request){

        $data = $request->input('uuid');
        $consulta_per = permisos::where('tr_uuid','=',$data)->get();
        $lstVigencias = vigencias::all();
        if( count($consulta_per) > 0 ) {
            return Response::JSON([
                    "respuesta" => true,
                    "id" => $consulta_per[0]['tr_cur_id'],
                    "uuid" => $consulta_per[0]['tr_uuid'],
                    "nombre" => $consulta_per[0]['tr_per_nombre'],
                    "descripcion" => $consulta_per[0]['tr_per_descripcion'],
                    "vigencia" => $lstVigencias[($consulta_per[0]['tr_per_vig_fk'])-1]->tr_vig_nombre,
                    "vigenciaId" => $consulta_per[0]['tr_per_vig_fk'],
                    "estadoId" => $consulta_per[0]['tr_per_est_fk'],
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
                $registro = new permisos();
                $registro->tr_uuid = $uuid;
                $registro->tr_per_nombre = $data['nombre'];
                $registro->tr_per_descripcion = $data['descripcion'];
                $registro->tr_per_usuario_creacion = 1;
                $registro->tr_per_usuario_modificacion = null;
                $registro->tr_per_fecha_creacion = date('Y-m-d H:i:s');
                $registro->tr_per_fecha_modificacion = null;
                $registro->tr_per_est_fk = $data['estado'];
                $registro->tr_per_vig_fk = $data['vigencia'];
                $result = $registro->save();

                if ($result) {
                    $cur = permisos::select('tr_uuid')->where('tr_uuid',$uuid)->get();
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
                $per_upt = permisos::where('tr_uuid','=',$data['uuid'])
                    ->update(["tr_per_nombre" => $data['nombre'],
                        "tr_per_descripcion" => $data['descripcion'],
                        "tr_per_est_fk" => $data['estado'],
                        "tr_per_vig_fk" => $data['vigencia']]);
                if($per_upt) {
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
        $cur = permisos::where('tr_uuid',$data)->get();
        $lstVigencias = vigencias::all();

        return Response::JSON([
                "respuesta" => true,
                "uuid" => $data,
                "id" => $cur[0]['tr_per_id'],
                "nombre" => $cur[0]['tr_per_nombre'],
                "descripcion" => $cur[0]['tr_per_descripcion'],
                "vigencia" => $lstVigencias[($cur[0]['tr_per_vig_fk'])-1]->tr_vig_nombre,
                "vigenciaId" => $cur[0]['tr_per_vig_fk'],
                "msg" => "Actualizacion Exitosamente !!"]
            , 200);
    }
}
