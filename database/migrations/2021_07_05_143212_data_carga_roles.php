<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DataCargaRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Insert some stuff
        DB::table('roles')->insert(
          array(
            'tr_rol_id' => 1,
            'tr_rol_nombre' => 'Administrador',
            'tr_rol_descripcion' => 'Administrador de la Aplicacion, mayor privilegios',
            'tr_rol_usuario_creacion' => null,
            'tr_rol_usuario_modificacion' => null,
            'tr_rol_fecha_creacion' => null,
            'tr_rol_fecha_modificaion' => null,
            'tr_rol_estado' => 1,
            'tr_rol_vigencia' => 1
          )
        );
        //
        DB::table('roles')->insert(
            array(
                'tr_rol_id' => 2,
                'tr_rol_nombre' => 'Profesor',
                'tr_rol_descripcion' => 'Profesor de la Aplicacion, privilegios restringidos',
                'tr_rol_usuario_creacion' => null,
                'tr_rol_usuario_modificacion' => null,
                'tr_rol_fecha_creacion' => null,
                'tr_rol_fecha_modificaion' => null,
                'tr_rol_estado' => 1,
                'tr_rol_vigencia' => 1
            )
        );
        //
        DB::table('roles')->insert(
            array(
                'tr_rol_id' => 3,
                'tr_rol_nombre' => 'Alumno',
                'tr_rol_descripcion' => 'Alumno en la Aplicacion, con pocos privilegios',
                'tr_rol_usuario_creacion' => null,
                'tr_rol_usuario_modificacion' => null,
                'tr_rol_fecha_creacion' => null,
                'tr_rol_fecha_modificaion' => null,
                'tr_rol_estado' => 1,
                'tr_rol_vigencia' => 1
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
