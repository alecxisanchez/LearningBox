<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DataCargaCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('cursos')->insert(
            array(
                'tr_cur_id' => 1,
                'tr_cur_nombre' => 'Programacion Orientada a Objetos',
                'tr_cur_descripcion' => 'Programacion Orientada a Objetos',
                'tr_cur_usuario_creacion' => null,
                'tr_cur_usuario_modificacion' => null,
                'tr_cur_fecha_creacion' => null,
                'tr_cur_fecha_modificaion' => null,
                'tr_cur_estado' => 1,
                'tr_cur_vigencia' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
