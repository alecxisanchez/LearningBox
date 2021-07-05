<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DataCargaPregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('preguntas')->insert(
            array(
                'tr_preg_id' => 1,
                'tr_preg_nombre' => 'Que es un Objeto ?',
                'tr_preg_descripcion' => 'Es una seleccion simple solo debe escoger una opcion etre las disponibles',
                'tr_preg_tipo_pregunta' => 1,
                'tr_preg_usuario_creacion' => null,
                'tr_preg_usuario_modificacion' => null,
                'tr_preg_fecha_creacion' => null,
                'tr_preg_fecha_modificaion' => null,
                'tr_preg_estado' => 1,
                'tr_preg_vigencia' => 1
            )
        );
        //
        DB::table('preguntas')->insert(
            array(
                'tr_preg_id' => 2,
                'tr_preg_nombre' => 'cual opcion es verdadera ?',
                'tr_preg_descripcion' => 'Es una seleccion simple solo debe escoger una opcion etre las disponibles',
                'tr_preg_tipo_pregunta' => 1,
                'tr_preg_usuario_creacion' => null,
                'tr_preg_usuario_modificacion' => null,
                'tr_preg_fecha_creacion' => null,
                'tr_preg_fecha_modificaion' => null,
                'tr_preg_estado' => 1,
                'tr_preg_vigencia' => 1
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
