<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\cursos;
use App\Models\estados;
use App\Models\usuarios;
use App\Models\vigencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

class MantenedorUsuariosController extends Controller
{
    //
    public function index(){

        $lstUsuarios = usuarios::all();
        $lstEstados = estados::all();
        $lstVigencias = vigencias::all();

        return View::make('mantenedores.usuarios.index')
            ->with('lstUsuarios',$lstUsuarios)
            ->with('lstEstados',$lstEstados)
            ->with('lstVigencias',$lstVigencias);

    }
    //
    public function search(Request $request){

        $data = $request->input('uuid');
        $consulta_usu = usuarios::where('tr_uuid','=',$data)->get();
        $lstVigencias = vigencias::all();
        if( count($consulta_usu) > 0 ) {
            return Response::JSON([
                    "respuesta" => true,
                    "id" => $consulta_usu[0]['tr_usu_id'],
                    "uuid" => $consulta_usu[0]['tr_uuid'],
                    "nombre" => $consulta_usu[0]['tr_usu_nombre'],
                    "email" => $consulta_usu[0]['tr_usu_mail'],
                    "pass" => $consulta_usu[0]['tr_usu_password'],
                    "vigencia" => $lstVigencias[($consulta_usu[0]['tr_usu_vig_fk'])-1]->tr_vig_nombre,
                    "vigenciaId" => $consulta_usu[0]['tr_usu_vig_fk'],
                    "estadoId" => $consulta_usu[0]['tr_usu_est_fk'],
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

                $nuevoUsuario = new usuarios();
                $nuevoUsuario->tr_uuid = $uuid;
                $nuevoUsuario->tr_usu_nombre = '';
                $nuevoUsuario->tr_usu_mail = strtolower('');
                $nuevoUsuario->tr_usu_password = bcrypt('');
                $nuevoUsuario->tr_usu_est_fk = 1;
                $nuevoUsuario->tr_usu_vig_fk = 1;
                $nuevoUsuario->save();

                /* Guardado de rol */
                $nuevoRolUsu = new usuarios_roles();
                $nuevoRolUsu->tr_uuid = $uuid;
                $nuevoRolUsu->ti_usu_rol_usu_fk = $nuevoUsuario->tr_usu_id;
                $nuevoRolUsu->ti_usu_rol_rol_fk = 1;
                $nuevoRolUsu->ti_usu_rol_est_fk = 1;
                $nuevoRolUsu->ti_usu_rol_vig_fk = 1;
                $nuevoRolUsu->ti_usu_rol_vigencia = 1;
                $nuevoRolUsu->save();

                /* Guardado de permiso */
                $nuevoPermisoUsu = new usuarios_permisos();
                $nuevoPermisoUsu->tr_uuid = $uuid;
                $nuevoPermisoUsu->ti_usu_per_usu_fk = $nuevoUsuario->tr_usu_id;
                $nuevoPermisoUsu->ti_usu_per_per_fk = 1;
                $nuevoPermisoUsu->ti_usu_per_est_fk = 1;
                $nuevoPermisoUsu->ti_usu_per_vig_fk = 1;
                $nuevoPermisoUsu->save();

                if ($nuevoUsuario) {
                    $cur = usuarios::select('tr_uuid')->where('tr_uuid',$uuid)->get();
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
                $cur_upt = usuarios::where('tr_uuid','=',$data['uuid'])
                    ->update(["tr_usu_nombre" => $data['nombre'],
                        "tr_usu_mail" => strtolower($data['descripcion']),
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
}
