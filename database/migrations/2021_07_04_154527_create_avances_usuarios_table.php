<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvancesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avances_usuarios', function (Blueprint $table) {
            $table->bigIncrements('ti_ava_usu_id');
            $table->bigInteger('ti_ava_usu_cur_fk')->unsigned();
            $table->bigInteger('ti_ava_usu_usu_fk')->unsigned();
            $table->bigInteger('ti_ava_usu_usuario_creacion')->nullable();
            $table->bigInteger('ti_ava_usu_usuario_modificacion')->nullable();
            $table->timestamp('ti_ava_usu_fecha_creacion')->nullable();
            $table->timestamp('ti_ava_usu_fecha_modificaion')->nullable();
            $table->integer('ti_ava_usu_vigencia');
            $table->foreign('ti_ava_usu_cur_fk')->references('tr_cur_id')->on('cursos');
            $table->foreign('ti_ava_usu_usu_fk')->references('tr_usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avances_usuarios');
    }
}
