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
        Log::info('LLego');
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
                'descripcion' => 'required|string|min:3|max:255'
                ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

        }else {
            $data = $request->input();
            $uuid = Uuid::uuid4();
            $registro = new categorias();
            $registro->tr_uuid = $uuid;
            $registro->tr_cat_nombre = $data['nombre'];
            $registro->tr_cat_descripcion = $data['descripcion'];
            $registro->tr_cat_usuario_creacion = 1;
            $registro->tr_cat_usuario_modificacion = null;
            $registro->tr_cat_fecha_creacion = date('Y-m-d H:i:s');
            $registro->tr_cat_fecha_modificacion = null;
            $registro->tr_cat_estado = 1;
            $registro->tr_cat_vigencia = 1;
            $result = $registro->save();

            if ($result) {
                $cat = categorias::select('tr_uuid')->where('tr_uuid',$uuid)->get();
                Log::info('id_uuid Generado: '.$cat[0]['tr_uuid']);
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
        }
    }
    //
    public function mostrar(Request $request){

        $data = $request->all();
        //Log::info( 'valor que llega controller: ' .$data['id'] );

        $cat = categorias::where('tr_uuid',$data['id'])->get();

        $lstEstados = estados::all();

        $lstVigencias = vigencias::all();

        return Response::JSON([
                "respuesta" => true,
                "id" => $cat[0]['tr_cat_id'],
                "nombre" => $cat[0]['tr_cat_nombre'],
                "descripcion" => $cat[0]['tr_cat_descripcion'],
                "estado" => $lstEstados[$cat[0]['tr_cat_estado']]->tr_est_nombre,
                "vigencia" => $lstVigencias[$cat[0]['tr_cat_vigencia']]->tr_vig_nombre,
                "msg" => "Actualizacion Exitosamente !!"]
            , 200);
    }
}
