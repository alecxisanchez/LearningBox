<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Support\Facades\View;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCourses = cursos::select('*')
            ->join('usuarios_cursos', 'cursos.tr_cur_id', '=', 'usuarios_cursos.ti_usu_cur_cur_fk')
            ->where('usuarios_cursos.ti_usu_cur_usu_fk', '=', \Auth::user()->tr_usu_id)
            ->get();

        $allCourses = cursos::all();

        $data = [
            'userCourses' => $userCourses,
            'allCourses' => $allCourses
        ];

        return View::make('sitio.dashboard.dashboard', $data);
    }

}
