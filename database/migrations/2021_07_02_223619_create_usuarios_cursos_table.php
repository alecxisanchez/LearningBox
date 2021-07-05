<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_cursos', function (Blueprint $table) {
            $table->bigIncrements('ti_usu_cur_id');
            $table->bigInteger('usu_fk')->unsigned();
            $table->bigInteger('cur_fk')->unsigned();
            $table->bigInteger('ti_usu_cur_usuario_creacion')->nullable();
            $table->bigInteger('ti_usu_cur_usuario_modificacion')->nullable();
            $table->timestamp('ti_usu_cur_fecha_creacion')->nullable();
            $table->timestamp('ti_usu_cur_fecha_modificaion')->nullable();
            $table->boolean('ti_usu_cur_vigencia');
            $table->foreign('usu_fk')->references('tr_usu_id')->on('usuarios');
            $table->foreign('cur_fk')->references('tr_cur_id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_cursos');
    }
}
