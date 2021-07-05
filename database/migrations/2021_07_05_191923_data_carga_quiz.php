<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataCargaQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('quiz')->insert(
            array(
                'tr_quiz_id' => 1,
                'tr_quiz_nombre' => 'Quiz Modulo I',
                'tr_quiz_descripcion' => 'Quiz de aprobacion del Modulo I',
                'tr_quiz_porcentaje_avance' => 100,
                'tr_quiz_usuario_creacion' => null,
                'tr_quiz_usuario_modificacion' => null,
                'tr_quiz_fecha_creacion' => null,
                'tr_quiz_fecha_modificaion' => null,
                'tr_quiz_estado' => 1,
                'tr_quiz_vigencia' => 1
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
