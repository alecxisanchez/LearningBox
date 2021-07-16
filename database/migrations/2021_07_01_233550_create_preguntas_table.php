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
            $table->Char('tr_uuid');
            $table->bigInteger('tr_preg_quiz_fk')->unsigned();
            $table->bigInteger('tr_preg_est_fk')->unsigned();
            $table->bigInteger('tr_preg_vig_fk')->unsigned();
            $table->string('tr_preg_nombre');
            $table->string('tr_preg_descripcion');
            $table->integer('tr_preg_tipo_pregunta');
            $table->bigInteger('tr_preg_usuario_creacion')->nullable();
            $table->bigInteger('tr_preg_usuario_modificacion')->nullable();
            $table->timestamp('tr_preg_fecha_creacion')->nullable();
            $table->timestamp('tr_preg_fecha_modificaion')->nullable();
            $table->foreign('tr_preg_quiz_fk')->references('tr_quiz_id')->on('quiz');
            $table->foreign('tr_preg_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_preg_vig_fk')->references('tr_vig_id')->on('vigencias');
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
