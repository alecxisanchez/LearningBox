<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->bigIncrements('tr_quiz_id');
            $table->string('tr_quiz_nombre');
            $table->string('tr_quiz_descripcion');
            $table->integer('tr_quiz_porcentaje_avance');
            $table->bigInteger('tr_quiz_usuario_creacion')->nullable();
            $table->bigInteger('tr_quiz_usuario_modificacion')->nullable();
            $table->timestamp('tr_quiz_fecha_creacion')->nullable();
            $table->timestamp('tr_quiz_fecha_modificaion')->nullable();
            $table->bigInteger('tr_quiz_estado');
            $table->boolean('tr_quiz_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz');
    }
}
