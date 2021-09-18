<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use App\Models\modulos;
use App\Models\rating;
use App\Models\unidades;
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
        $modulosUnidades = modulos::with('unidades')->where('tr_mod_cur_fk', $idCurso)->get();
        $cursoRating = rating::where('tr_rat_cur_fk', $idCurso)->avg('tr_rat_estrellas');
        $cursoRatingCant = rating::where('tr_rat_cur_fk', $idCurso)->count();

        $data = [
            'cursoDetalle' => $cursoDetalle,
            'modulosUnidades' => $modulosUnidades,
            'cursoRating' => round($cursoRating, 0),
            'cursoRatingCant' => $cursoRatingCant
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

    /**
     * @param $idUnidad
     * @return \Illuminate\Contracts\View\View
     */
    public function detallesUnidad($idUnidad)
    {
        $unidadDetalles = unidades::join('modulos', 'unidades.tr_uni_mod_fk', 'modulos.tr_mod_id')
            ->join('cursos', 'modulos.tr_mod_cur_fk', 'cursos.tr_cur_id')
            ->leftJoin('contenidos_unidad', 'unidades.tr_uni_id', 'contenidos_unidad.ti_cont_uni_uni_fk')
            ->leftJoin('contenidos_archivos', 'contenidos_unidad.ti_cont_uni_arc_fk', 'contenidos_archivos.tr_cont_arc_id')
            ->where('unidades.tr_uni_id', $idUnidad)
            ->first();

        \Log::debug('CursosController.detallesUnidad', ['unidadDetalles' => $unidadDetalles]);

        $data = [
            'unidadDetalles' => $unidadDetalles
        ];

        return View::make('sitio.curso.detalle-unidad', $data);
    }

}
