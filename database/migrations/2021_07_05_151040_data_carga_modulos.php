<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DataCargaModulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('modulos')->insert(
            array(
                'tr_mod_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_mod_nombre' => 'Modulo I',
                'tr_mod_descripcion' => 'Modulo I (Programacion Orientada a Objetos) ',
                'tr_mod_usuario_creacion' => null,
                'tr_mod_usuario_modificacion' => null,
                'tr_mod_fecha_creacion' => null,
                'tr_mod_fecha_modificaion' => null,
                'tr_mod_est_fk' => 1,
                'tr_mod_vig_fk' => 1,
                'tr_mod_cur_fk' => 1
            )
        );
        //
        DB::table('modulos')->insert(
            array(
                'tr_mod_id' => 2,
                'tr_uuid' => Uuid::uuid4(),
                'tr_mod_nombre' => 'Modulo II',
                'tr_mod_descripcion' => 'Modulo II (Programacion Orientada a Objetos) ',
                'tr_mod_usuario_creacion' => null,
                'tr_mod_usuario_modificacion' => null,
                'tr_mod_fecha_creacion' => null,
                'tr_mod_fecha_modificaion' => null,
                'tr_mod_est_fk' => 1,
                'tr_mod_vig_fk' => 1,
                'tr_mod_cur_fk' => 1
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
