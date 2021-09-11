<?php

namespace App\Http\Controllers\mantenedor;

use App\Classes\Enigma;
use App\Constantes\Constante;
use App\Http\Controllers\Controller;
use App\Models\archivos;
use App\Models\estados;
use App\Models\preguntas;
use App\Models\Sequence;
use App\Models\UsuariosAuth;
use App\Models\vigencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

class MantenedorArchivosController extends Controller
{
    //
    public function index(){

        return View::make('mantenedores.archivos.index');
    }
    //--------------
    public function save(Request $request)
    {
        ini_set('max_execution_time', 100000);
        DB::beginTransaction();
        try {
            $docSolicitud = new archivos();
            foreach ($request->files as $doc) {
                foreach ($doc as $index => $docReal) {
                    //genera variables
                    $uuid = Uuid::uuid4();
                    $file_name = date('YmdHis') . '.' . $docReal->getClientOriginalExtension();
                    $id_tipo = json_decode($request->input("detalleDocs")[$index])->razon;

                    //guardar objeto
                    $docSolicitud->tr_uuid = $uuid;
                    $docSolicitud->tr_arc_nombre = $docReal->getClientOriginalName();
                    $docSolicitud->tr_arc_nombre_sistema = $file_name;
                    $docSolicitud->tr_arc_fecha_carga = date('Y-m-d H:i:s');
                    $docSolicitud->tr_arc_est_fk = 1;
                    $docSolicitud->tr_arc_vig_fk = 1;
                    $docSolicitud->tr_arc_usuario_creacion = '';
                    $docSolicitud->tr_arc_descripcion = '';
                    $docSolicitud->tr_arc_usuario_modificacion = '';
                    $docSolicitud->tr_arc_fecha_creacion = '';
                    $docSolicitud->tr_arc_fecha_modificaion = '';

                    if ($docSolicitud->save()) {
                        if (!File::exists(storage_path('Documentos'))) {
                            Storage::makeDirectory(storage_path('Documentos'));
                        }
                        $docReal->move(storage_path('Documentos'), $file_name);

                        return Response::JSON(
                            [
                                "respuesta" => true,
                                "msg" => "Guardado con Exito !!!"
                            ],
                            200
                        );
                    }
                }
            }
            DB::commit();
        } catch (Exception $ex) {
            log::info(
                "Error a guardar Archivo ",
                [
                    "trace" => $ex->getTraceAsString(),
                    "mensaje" => $ex->getMessage()
                ]
            );
            DB::rollback();
            return Response::JSON(["respuesta" => false], 400);
        }
    }
}
