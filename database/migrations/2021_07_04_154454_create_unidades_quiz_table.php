<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_quiz', function (Blueprint $table) {
            $table->bigIncrements('ti_uni_quiz_id');
            $table->bigInteger('ti_uni_quiz_uni_fk')->unsigned();
            $table->bigInteger('ti_uni_quiz_quiz_fk')->unsigned();
            $table->bigInteger('ti_uni_quiz_usuario_creacion')->nullable();
            $table->bigInteger('ti_uni_quiz_usuario_modificacion')->nullable();
            $table->timestamp('ti_uni_quiz_fecha_creacion')->nullable();
            $table->timestamp('ti_uni_quiz_fecha_modificaion')->nullable();
            $table->bigInteger('ti_uni_quiz_estado');
            $table->boolean('ti_uni_quiz_vigencia');
            $table->foreign('ti_uni_quiz_uni_fk')->references('tr_uni_id')->on('unidades');
            $table->foreign('ti_uni_quiz_quiz_fk')->references('tr_quiz_id')->on('quiz');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades_quiz');
    }
}
