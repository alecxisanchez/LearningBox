<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

/**
 * Class CursosController
 * @package App\Http\Controllers
 */
class CursosController extends Controller
{
    /**
     * @param $idCurso
     * @return \Illuminate\Contracts\View\View
     */
    public function detallesCurso($idCurso)
    {
        $cursoDetalle = cursos::where('tr_cur_id', $idCurso)->first();
        $cursoRating = rating::where('tr_rat_cur_fk', $idCurso)->avg('tr_rat_estrellas');

        $data = [
            'cursoDetalle' => $cursoDetalle,
            'cursoRating' => round($cursoRating, 0)
        ];

        return View::make('sitio.curso.detalle-curso', $data);
    }

    /**
     * @param $curso
     * @param $estrellas
     * @return \Illuminate\Http\JsonResponse
     */
    public function guardarRating($curso, $estrellas)
    {
        $buscarRating = rating::where('tr_rat_cur_fk', $curso)
            ->where('tr_rat_usu_fk', \Auth::user()->tr_usu_id)
            ->first();

        if (!empty($buscarRating)) {
            /* Edición de rating */
            $dataUpdate = [
                'tr_rat_estrellas' => $estrellas
            ];
            $editarRating = rating::where('tr_rat_id', $buscarRating->tr_rat_id)->firstorFail();
            $editarRating->update($dataUpdate);
        } else {
            /* Guardado de rating */
            $nuevoRating = new rating();
            $nuevoRating->tr_rat_cur_fk = $curso;
            $nuevoRating->tr_rat_usu_fk = \Auth::user()->tr_usu_id;
            $nuevoRating->tr_rat_estrellas = $estrellas;
            $nuevoRating->save();
        }

        return Response::JSON([
            "respuesta" => true,
            "data" => [$curso, \Auth::user()->tr_usu_id, $estrellas],
            "msg" => "Guardado exitoso."],
            200);
    }

}
