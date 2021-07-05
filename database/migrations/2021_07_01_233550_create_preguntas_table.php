<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('tr_preg_id');
            $table->string('tr_preg_nombre');
            $table->string('tr_preg_descripcion');
            $table->integer('tr_preg_tipo_pregunta');
            $table->bigInteger('tr_preg_usuario_creacion')->nullable();
            $table->bigInteger('tr_preg_usuario_modificacion')->nullable();
            $table->timestamp('tr_preg_fecha_creacion')->nullable();
            $table->timestamp('tr_preg_fecha_modificaion')->nullable();
            $table->bigInteger('tr_preg_estado');
            $table->boolean('tr_preg_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
