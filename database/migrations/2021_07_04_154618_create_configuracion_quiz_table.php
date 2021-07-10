<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracion_quiz', function (Blueprint $table) {

            $table->bigIncrements('tr_confquiz_id');
            $table->Char('tr_uuid');
            $table->string('tr_confquiz_tiempo');
            $table->string('tr_confquiz_nro_preguntas');
            $table->string('tr_confquiz_nro_preguntas_aprobacion');
            $table->bigInteger('tr_confquiz_usuario_creacion')->nullable();
            $table->bigInteger('tr_confquiz_usuario_modificacion')->nullable();
            $table->timestamp('tr_confquiz_fecha_creacion')->nullable();
            $table->timestamp('tr_confquiz_fecha_modificaion')->nullable();
            $table->bigInteger('tr_confquiz_estado');
            $table->boolean('tr_confquiz_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracion_quiz');
    }
}
