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
            $table->Char('tr_uuid');
            $table->bigInteger('ti_uni_quiz_uni_fk')->unsigned();
            $table->bigInteger('ti_uni_quiz_quiz_fk')->unsigned();
            $table->bigInteger('ti_uni_quiz_est_fk')->unsigned();
            $table->bigInteger('ti_uni_quiz_vig_fk')->unsigned();
            $table->bigInteger('ti_uni_quiz_usuario_creacion')->nullable();
            $table->bigInteger('ti_uni_quiz_usuario_modificacion')->nullable();
            $table->timestamp('ti_uni_quiz_fecha_creacion')->nullable();
            $table->timestamp('ti_uni_quiz_fecha_modificaion')->nullable();
            $table->foreign('ti_uni_quiz_uni_fk')->references('tr_uni_id')->on('unidades');
            $table->foreign('ti_uni_quiz_quiz_fk')->references('tr_quiz_id')->on('quiz');
            $table->foreign('ti_uni_quiz_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('ti_uni_quiz_vig_fk')->references('tr_vig_id')->on('vigencias');
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
