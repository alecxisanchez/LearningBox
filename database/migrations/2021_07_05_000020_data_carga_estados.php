<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DataCargaEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //
       DB::table('estados')->insert(
        array(
            'tr_est_id' => 1,
            'tr_uuid' => Uuid::uuid4(),
            'tr_est_nombre' => 'Activo',
            'tr_est_descripcion' => 'Activo',
            'tr_est_usuario_creacion' => null,
            'tr_est_usuario_modificacion' => null,
            'tr_est_fecha_creacion' => null,
            'tr_est_fecha_modificacion' => null
            )
        );
        //
       DB::table('estados')->insert(
        array(
            'tr_est_id' => 2,
            'tr_uuid' => Uuid::uuid4(),
            'tr_est_nombre' => 'Inactivo',
            'tr_est_descripcion' => 'Inactivo',
            'tr_est_usuario_creacion' => null,
            'tr_est_usuario_modificacion' => null,
            'tr_est_fecha_creacion' => null,
            'tr_est_fecha_modificacion' => null
            )
        );
        //
        DB::table('estados')->insert(
            array(
                'tr_est_id' => 3,
                'tr_uuid' => Uuid::uuid4(),
                'tr_est_nombre' => 'En Progreso',
                'tr_est_descripcion' => 'En Progreso',
                'tr_est_usuario_creacion' => null,
                'tr_est_usuario_modificacion' => null,
                'tr_est_fecha_creacion' => null,
                'tr_est_fecha_modificacion' => null
            )
        );
        //
        DB::table('estados')->insert(
            array(
                'tr_est_id' => 4,
                'tr_uuid' => Uuid::uuid4(),
                'tr_est_nombre' => 'En Pausa',
                'tr_est_descripcion' => 'En Pausa',
                'tr_est_usuario_creacion' => null,
                'tr_est_usuario_modificacion' => null,
                'tr_est_fecha_creacion' => null,
                'tr_est_fecha_modificacion' => null
            )
        );
        //
        DB::table('estados')->insert(
            array(
                'tr_est_id' => 5,
                'tr_uuid' => Uuid::uuid4(),
                'tr_est_nombre' => 'Finalizado',
                'tr_est_descripcion' => 'Finalizado',
                'tr_est_usuario_creacion' => null,
                'tr_est_usuario_modificacion' => null,
                'tr_est_fecha_creacion' => null,
                'tr_est_fecha_modificacion' => null
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
