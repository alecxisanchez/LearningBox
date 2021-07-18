<?php

namespace App\Http\Controllers;

use App\Models\permisos;
use App\Models\roles;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
            return redirect('/')->with('message_error', _('Error accediendo al sistema'));
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
        return redirect()->intended('/')
            ->with('message_success', 'Tu sesión ha sido cerrada.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginView()
    {
        return View::make('sitio.sesion');
    }

}
