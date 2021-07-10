<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DataCargaCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('categorias')->insert(
            array(
                'tr_cat_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_cat_nombre' => 'Educacion',
                'tr_cat_descripcion' => 'Rama de Educacion',
                'tr_cat_usuario_creacion' => null,
                'tr_cat_usuario_modificacion' => null,
                'tr_cat_fecha_creacion' => null,
                'tr_cat_fecha_modificacion' => null,
                'tr_cat_estado' => 1,
                'tr_cat_vigencia' => 1
            )
        );
        //
        DB::table('categorias')->insert(
            array(
                'tr_cat_id' => 2,
                'tr_uuid' => Uuid::uuid4(),
                'tr_cat_nombre' => 'Ciencias',
                'tr_cat_descripcion' => 'Rama de Ciencias',
                'tr_cat_usuario_creacion' => null,
                'tr_cat_usuario_modificacion' => null,
                'tr_cat_fecha_creacion' => null,
                'tr_cat_fecha_modificacion' => null,
                'tr_cat_estado' => 1,
                'tr_cat_vigencia' => 1
            )
        );
        //
        DB::table('categorias')->insert(
            array(
                'tr_cat_id' => 3,
                'tr_uuid' => Uuid::uuid4(),
                'tr_cat_nombre' => 'Tecnologia',
                'tr_cat_descripcion' => 'Rama de Tecnologia',
                'tr_cat_usuario_creacion' => null,
                'tr_cat_usuario_modificacion' => null,
                'tr_cat_fecha_creacion' => null,
                'tr_cat_fecha_modificacion' => null,
                'tr_cat_estado' => 1,
                'tr_cat_vigencia' => 1
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
