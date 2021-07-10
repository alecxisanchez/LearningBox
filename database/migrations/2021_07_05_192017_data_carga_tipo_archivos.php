<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DataCargaTipoArchivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('tipo_archivos')->insert(
            array(
                'tr_tiparc_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_tiparc_nombre' => 'Pdf',
                'tr_tiparc_descripcion' => 'Archivo tipo Pdf',
                'tr_tiparc_usuario_creacion' => null,
                'tr_tiparc_usuario_modificacion' => null,
                'tr_tiparc_fecha_creacion' => null,
                'tr_tiparc_fecha_modificacion' => null,
                'tr_tiparc_estado' => 1,
                'tr_tiparc_vigencia' => 1
            )
        );
        //
        DB::table('tipo_archivos')->insert(
            array(
                'tr_tiparc_id' => 2,
                'tr_uuid' => Uuid::uuid4(),
                'tr_tiparc_nombre' => 'Video',
                'tr_tiparc_descripcion' => 'Archivo tipo Video',
                'tr_tiparc_usuario_creacion' => null,
                'tr_tiparc_usuario_modificacion' => null,
                'tr_tiparc_fecha_creacion' => null,
                'tr_tiparc_fecha_modificacion' => null,
                'tr_tiparc_estado' => 1,
                'tr_tiparc_vigencia' => 1
            )
        );
        //
        DB::table('tipo_archivos')->insert(
            array(
                'tr_tiparc_id' => 3,
                'tr_uuid' => Uuid::uuid4(),
                'tr_tiparc_nombre' => 'Audio',
                'tr_tiparc_descripcion' => 'Archivo tipo Audio',
                'tr_tiparc_usuario_creacion' => null,
                'tr_tiparc_usuario_modificacion' => null,
                'tr_tiparc_fecha_creacion' => null,
                'tr_tiparc_fecha_modificacion' => null,
                'tr_tiparc_estado' => 1,
                'tr_tiparc_vigencia' => 1
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
