<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

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
                'tr_uuid' => Uuid::uuid4(),
                'tr_cur_nombre' => 'Programacion Orientada a Objetos',
                'tr_cur_descripcion' => 'Programacion Orientada a Objetos',
                'tr_cur_usuario_creacion' => null,
                'tr_cur_usuario_modificacion' => null,
                'tr_cur_fecha_creacion' => null,
                'tr_cur_fecha_modificacion' => null,
                'tr_cur_cat_fk' => 1,
                'tr_cur_est_fk' => 1,
                'tr_cur_vig_fk' => 1
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
