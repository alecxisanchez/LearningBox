<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Models\usuarios_permisos;
use App\Models\usuarios_roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

/**
 * Class UsuariosController
 * @package App\Http\Controllers
 */
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('sitio.registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string',
                'email' => 'required|email|unique:usuarios,tr_usu_mail',
                'password' => 'required|confirmed|min:6'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->with('message_error', _('Ha ocurrido un error creando el usuario.'));
            } else {
                $name = $request->input('name');
                $email = $request->input('email');
                $password = $request->input('password');
                $uuid = Uuid::uuid4();

                /* Guardado de usuario */
                $nuevoUsuario = new usuarios();
                $nuevoUsuario->tr_uuid = $uuid;
                $nuevoUsuario->tr_usu_nombre = $name;
                $nuevoUsuario->tr_usu_mail = strtolower($email);
                $nuevoUsuario->tr_usu_password = bcrypt($password);
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

                //\Auth::loginUsingId($user->tr_usu_id);

                return redirect()->back()->with('message_success', _('Usuario creado exitosamente.'));
            }
        } catch (\Exception $ex) {
            \Log::error('UsuariosController.store', ['exception' => $ex]);
            return redirect()->back()->with('message_error', _('Ha ocurrido un error creando el usuario.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = usuarios::where('tr_usu_id', $id)->first();

        $data = [
            'nombre' => $usuario->tr_usu_nombre,
            'email' => $usuario->tr_usu_mail
        ];

        return View::make('sitio.usuarios.perfil', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'name' => 'required|string',
                'password' => 'confirmed|min:6'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                \Log::debug('UsuariosController.update', ['validator fail' => $validator->errors()->first()]);

                return Response::JSON([
                        "error" => true,
                        "msg" => "El campo nombre o email estan vacios o no corresponde la contraseña"],
                    401);
            } else {
                \Log::debug('UsuariosController.update', ['validator success' => $id]);
                $name = $request->input('name');
                $password = $request->input('password');

                if (!empty($password)) {
                    $dataUpdate = [
                        'tr_usu_nombre' => $name,
                        'tr_usu_password' => bcrypt($password)
                    ];
                } else {
                    $dataUpdate = [
                        'tr_usu_nombre' => $name
                    ];
                }

                /* Edición de usuario */
                $userProfile = usuarios::where('tr_usu_id', $id)->firstorFail();
                $userProfile->update($dataUpdate);

                return Response::JSON([
                    "respuesta" => true,
                    "data" => $dataUpdate,
                    "msg" => "Guardado Exitosamente !!"],
                    200);
            }
        } catch (\Exception $ex) {
            \Log::error('UsuariosController.update', ['exception' => $ex]);
            return Response::JSON([
                "error" => true,
                "msg" => "Ha ocurrido un error actualizando los datos"],
                401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
