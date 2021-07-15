<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->bigIncrements('tr_res_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_res_preg_fk')->unsigned();
            $table->string('tr_res_nombre');
            $table->string('tr_res_descripcion');
            $table->integer('tr_res_orden');
            $table->integer('tr_res_respuesta_correcta');
            $table->bigInteger('tr_res_usuario_creacion')->nullable();
            $table->bigInteger('tr_res_usuario_modificacion')->nullable();
            $table->timestamp('tr_res_fecha_creacion')->nullable();
            $table->timestamp('tr_res_fecha_modificaion')->nullable();
            $table->integer('tr_res_estado');
            $table->bigInteger('tr_res_vigencia');
            $table->foreign('tr_res_preg_fk')->references('tr_preg_id')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
