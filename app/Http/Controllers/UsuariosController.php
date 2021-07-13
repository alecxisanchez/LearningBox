<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;
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
        return View::make('admin.registro');
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

                $newUser = new usuarios();
                $newUser->tr_uuid = $uuid;
                $newUser->tr_usu_nombre = $name;
                $newUser->tr_usu_mail = $email;
                $newUser->tr_usu_password = bcrypt($password);
                $newUser->tr_usu_estado = 1;
                $newUser->tr_usu_vigencia = 1;
                $user = $newUser->save();

                //\Auth::loginUsingId($user->id);

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
        //
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
        //
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
