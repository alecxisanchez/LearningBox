<?php

namespace App\Http\Controllers\Mantenedor;

use App\Http\Controllers\Controller;
use App\Models\vigencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MantenedorModulosController extends Controller
{
    //
    public function index(){
        $Sqlmodulos = 'SELECT A.tr_uuid, A.tr_mod_nombre,A.tr_mod_vig_fk,B.tr_cur_cat_fk,B.tr_cur_nombre,C.tr_cat_nombre
                        FROM modulos A
                       JOIN cursos B ON( A. TR_MOD_CUR_FK = TR_CUR_ID)
                       JOIN categorias C ON (B.tr_cur_cat_fk = C.tr_cat_id )';
        $consulta = DB::select($Sqlmodulos);
        $lstVigencias = vigencias::all();
        return View::make('mantenedores.modulos.index')
            ->with('lstModulos',$consulta)
            ->with('lstVigencias',$lstVigencias);
    }
}
