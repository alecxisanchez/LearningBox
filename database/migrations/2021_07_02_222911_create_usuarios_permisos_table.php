<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_permisos', function (Blueprint $table) {
            $table->bigIncrements('ti_usu_per_id');
            $table->bigInteger('usu_fk')->unsigned();
            $table->bigInteger('per_fk')->unsigned();
            $table->bigInteger('ti_usu_per_usuario_creacion')->nullable();
            $table->bigInteger('ti_usu_per_usuario_modificacion')->nullable();
            $table->timestamp('ti_usu_per_fecha_creacion')->nullable();
            $table->timestamp('ti_usu_per_fecha_modificaion')->nullable();
            $table->boolean('ti_usu_per_vigencia');
            $table->foreign('usu_fk')->references('tr_usu_id')->on('usuarios');
            $table->foreign('per_fk')->references('tr_per_id')->on('permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_permisos');
    }
}
