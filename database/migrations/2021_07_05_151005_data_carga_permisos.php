<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class DataCargaPermisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('permisos')->insert(
            array(
                'tr_per_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_per_nombre' => 'Modulo Usuarios',
                'tr_per_descripcion' => 'Modulo Global Usuarios',
                'tr_per_usuario_creacion' => null,
                'tr_per_usuario_modificacion' => null,
                'tr_per_fecha_creacion' => null,
                'tr_per_fecha_modificaion' => null,
                'tr_per_estado' => 1,
                'tr_per_vigencia' => 1
            )
        );
        //
        DB::table('permisos')->insert(
            array(
                'tr_per_id' => 2,
                'tr_uuid' => Uuid::uuid4(),
                'tr_per_nombre' => 'Modulo Roles',
                'tr_per_descripcion' => 'Modulo Global Roles',
                'tr_per_usuario_creacion' => null,
                'tr_per_usuario_modificacion' => null,
                'tr_per_fecha_creacion' => null,
                'tr_per_fecha_modificaion' => null,
                'tr_per_estado' => 1,
                'tr_per_vigencia' => 1
            )
        );
        //
        DB::table('permisos')->insert(
            array(
                'tr_per_id' => 3,
                'tr_uuid' => Uuid::uuid4(),
                'tr_per_nombre' => 'Modulo Permisos',
                'tr_per_descripcion' => 'Modulo Global Permisos',
                'tr_per_usuario_creacion' => null,
                'tr_per_usuario_modificacion' => null,
                'tr_per_fecha_creacion' => null,
                'tr_per_fecha_modificaion' => null,
                'tr_per_estado' => 1,
                'tr_per_vigencia' => 1
            )
        );
        //
        DB::table('permisos')->insert(
            array(
                'tr_per_id' => 4,
                'tr_uuid' => Uuid::uuid4(),
                'tr_per_nombre' => 'Modulo Categorias',
                'tr_per_descripcion' => 'Modulo Global Categorias',
                'tr_per_usuario_creacion' => null,
                'tr_per_usuario_modificacion' => null,
                'tr_per_fecha_creacion' => null,
                'tr_per_fecha_modificaion' => null,
                'tr_per_estado' => 1,
                'tr_per_vigencia' => 1
            )
        );
        //
        DB::table('permisos')->insert(
            array(
                'tr_per_id' => 5,
                'tr_uuid' => Uuid::uuid4(),
                'tr_per_nombre' => 'Modulo Cursos',
                'tr_per_descripcion' => 'Modulo Global Cursos',
                'tr_per_usuario_creacion' => null,
                'tr_per_usuario_modificacion' => null,
                'tr_per_fecha_creacion' => null,
                'tr_per_fecha_modificaion' => null,
                'tr_per_estado' => 1,
                'tr_per_vigencia' => 1
            )
        );
        //
        DB::table('permisos')->insert(
            array(
                'tr_per_id' => 6,
                'tr_uuid' => Uuid::uuid4(),
                'tr_per_nombre' => 'Modulo Modulos',
                'tr_per_descripcion' => 'Modulo Global Modulos',
                'tr_per_usuario_creacion' => null,
                'tr_per_usuario_modificacion' => null,
                'tr_per_fecha_creacion' => null,
                'tr_per_fecha_modificaion' => null,
                'tr_per_estado' => 1,
                'tr_per_vigencia' => 1
            )
        );
        //
        DB::table('permisos')->insert(
            array(
                'tr_per_id' => 7,
                'tr_uuid' => Uuid::uuid4(),
                'tr_per_nombre' => 'Modulo Unidades',
                'tr_per_descripcion' => 'Modulo Global Unidades',
                'tr_per_usuario_creacion' => null,
                'tr_per_usuario_modificacion' => null,
                'tr_per_fecha_creacion' => null,
                'tr_per_fecha_modificaion' => null,
                'tr_per_estado' => 1,
                'tr_per_vigencia' => 1
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
