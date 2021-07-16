<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DataCargaUnidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('unidades')->insert(
            array(
                'tr_uni_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_uni_nombre' => 'Definicion de Clases',
                'tr_uni_descripcion' => 'Madulo I (Definicion de Clases)',
                'tr_uni_usuario_creacion' => null,
                'tr_uni_usuario_modificacion' => null,
                'tr_uni_fecha_creacion' => null,
                'tr_uni_fecha_modificaion' => null,
                'tr_uni_est_fk' => 1,
                'tr_uni_vig_fk' => 1,
                'tr_uni_mod_fk' => 1
            )
        );
        //
        DB::table('unidades')->insert(
            array(
                'tr_uni_id' => 2,
                'tr_uuid' => Uuid::uuid4(),
                'tr_uni_nombre' => 'Definicion de Atributos',
                'tr_uni_descripcion' => 'Madulo I (Definicion de Atributos)',
                'tr_uni_usuario_creacion' => null,
                'tr_uni_usuario_modificacion' => null,
                'tr_uni_fecha_creacion' => null,
                'tr_uni_fecha_modificaion' => null,
                'tr_uni_est_fk' => 1,
                'tr_uni_vig_fk' => 1,
                'tr_uni_mod_fk' => 1
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
