<?php

namespace App\Http\Controllers;

use App\Models\permisos;
use App\Models\roles;
use App\Models\usuarios;
use App\Models\usuarios_permisos;
use App\Models\usuarios_roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $email = strtolower($request->input('email'));
        $password = $request->input('password');

        $usuario = usuarios::where('tr_usu_mail', $email)->first();

        $credenciales = ['tr_usu_mail' => $email, 'password' => $password, 'tr_usu_vig_fk' => true];

        try {
            if ($usuario) {

                if ($usuario->tr_usu_est_fk) {

                    if (\Auth::attempt($credenciales)) {

                        $permisos = collect();
                        $roles = roles::with(['permisos'])->whereHas('usuarios', function ($query) {
                            $query->where('ti_usu_rol_usu_fk', \Auth::user()->tr_usu_id);
                        })->get();

                        $permisos_adicionales = permisos::join('usuarios_permisos', 'permisos.tr_per_id', '=', 'usuarios_permisos.ti_usu_per_per_fk')
                            ->where('ti_usu_per_usu_fk', \Auth::user()->tr_usu_id)
                            ->get();

                        foreach ($roles as $role) {
                            foreach ($role->permisos as $permiso) {
                                $permisos->push($permiso->tr_per_id);
                            }
                        }

                        foreach ($permisos_adicionales as $permiso) {
                            $permisos->push($permiso->tr_per_id);
                        }

                        $permisos_unicos = $permisos->unique()->values()->all();

                        if (in_array(1, $permisos_unicos)) {
                            \Session::put('access_list', $permisos_unicos);
                            return redirect()->route('dashboard');
                        } else {
                            \Auth::logout();
                            \Session::flush();
                            return redirect()->route('login-view')
                                ->withInput()
                                ->with('message_error', 'Error al iniciar sesión');
                        }
                    } else {
                        return redirect()->route('login-view')
                            ->withInput()
                            ->with('message_error', 'Error al iniciar sesión');
                    }
                } else {
                    return redirect()->route('login-view')
                        ->withInput()
                        ->with('message_error', 'Cuenta inactiva');
                }
            } else {
                return redirect()->route('login-view')
                    ->withInput()
                    ->with('message_error', 'Error accediendo al sistema');
            }
        } catch (\Exception $ex) {
            \Log::error('Auth.login', ['Exception' => $ex]);
            return redirect()->route('login-view')->with('message_error', _('Error accediendo al sistema'));
        }
    }

    /**
     * Admin Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login-view')
            ->with('message_success', 'Tu sesión ha sido cerrada.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginView()
    {
        if (\Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return View::make('sitio.sesion');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function loginGoogle(Request $request)
    {
        $email = strtolower($request->input('email'));
        $name = $request->input('name');
        $password = strtolower($request->input('email'));

        \Log::info('AuthController.loginGoogle', ['email' => $email, 'name' => $name]);

        $usuario = usuarios::where('tr_usu_mail', $email)->first();

        if (\Auth::check()) {
            return Response::JSON([
                    "respuesta" => true,
                    "msg" => "Se encuentra logueado",
                    "ruta" => route('dashboard')]
                , 200);
        } else {
            if (!empty($usuario)) {
                if ($usuario->tr_usu_est_fk) {

                    $permisos = collect();
                    $roles = roles::with(['permisos'])->whereHas('usuarios', function ($query) use ($usuario) {
                        $query->where('ti_usu_rol_usu_fk', $usuario->tr_usu_id);
                    })->get();

                    $permisos_adicionales = permisos::join('usuarios_permisos', 'permisos.tr_per_id', '=', 'usuarios_permisos.ti_usu_per_per_fk')
                        ->where('ti_usu_per_usu_fk', $usuario->tr_usu_id)
                        ->get();

                    foreach ($roles as $role) {
                        foreach ($role->permisos as $permiso) {
                            $permisos->push($permiso->tr_per_id);
                        }
                    }

                    foreach ($permisos_adicionales as $permiso) {
                        $permisos->push($permiso->tr_per_id);
                    }

                    $permisos_unicos = $permisos->unique()->values()->all();

                    if (in_array(1, $permisos_unicos)) {
                        \Auth::loginUsingId($usuario->tr_usu_id);
                        \Session::put('access_list', $permisos_unicos);
                        return Response::JSON([
                                "respuesta" => true,
                                "msg" => "Login exitoso",
                                "ruta" => route('dashboard')]
                            , 200);
                    } else {
                        \Auth::logout();
                        \Session::flush();
                        return Response::JSON([
                                "respuesta" => false,
                                "msg" => 'Error al iniciar sesión',
                                "ruta" => route('login-view')
                                ]
                            , 200);
                    }
                }
            } else {
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

                $permisos = collect();
                $roles = roles::with(['permisos'])->whereHas('usuarios', function ($query) use ($nuevoUsuario) {
                    $query->where('ti_usu_rol_usu_fk', $nuevoUsuario->tr_usu_id);
                })->get();

                $permisos_adicionales = permisos::join('usuarios_permisos', 'permisos.tr_per_id', '=', 'usuarios_permisos.ti_usu_per_per_fk')
                    ->where('ti_usu_per_usu_fk', $nuevoUsuario->tr_usu_id)
                    ->get();

                foreach ($roles as $role) {
                    foreach ($role->permisos as $permiso) {
                        $permisos->push($permiso->tr_per_id);
                    }
                }

                foreach ($permisos_adicionales as $permiso) {
                    $permisos->push($permiso->tr_per_id);
                }

                $permisos_unicos = $permisos->unique()->values()->all();

                if (in_array(1, $permisos_unicos)) {
                    \Auth::loginUsingId($usuario->tr_usu_id);
                    \Session::put('access_list', $permisos_unicos);

                    return Response::JSON([
                            "respuesta" => true,
                            "msg" => "Registro y Login exitoso",
                            "ruta" => route('dashboard')]
                        , 200);
                } else {
                    \Auth::logout();
                    \Session::flush();

                    return Response::JSON([
                            "respuesta" => false,
                            "msg" => 'Error al iniciar sesión',
                            "ruta" => route('login-view')
                        ]
                        , 401);
                }
            }
        }
    }

}
