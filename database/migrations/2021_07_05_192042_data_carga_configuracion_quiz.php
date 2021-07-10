<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DataCargaConfiguracionQuiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('configuracion_quiz')->insert(
            array(
                'tr_confquiz_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_confquiz_tiempo' => 5,
                'tr_confquiz_nro_preguntas' => 2,
                'tr_confquiz_nro_preguntas_aprobacion' => 1,
                'tr_confquiz_usuario_creacion' => null,
                'tr_confquiz_usuario_modificacion' => null,
                'tr_confquiz_fecha_creacion' => null,
                'tr_confquiz_fecha_modificaion' => null,
                'tr_confquiz_estado' => 1,
                'tr_confquiz_vigencia' => 1
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
