<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->bigIncrements('ti_usu_rol_id');
            $table->Char('tr_uuid');
            $table->bigInteger('ti_usu_rol_usu_fk')->unsigned();
            $table->bigInteger('ti_usu_rol_rol_fk')->unsigned();
            $table->bigInteger('ti_usu_rol_usuario_creacion')->nullable();
            $table->bigInteger('ti_usu_rol_usuario_modificacion')->nullable();
            $table->timestamp('ti_usu_rol_fecha_creacion')->nullable();
            $table->timestamp('ti_usu_rol_fecha_modificaion')->nullable();
            $table->bigInteger('ti_usu_rol_vigencia');
            $table->foreign('ti_usu_rol_usu_fk')->references('tr_usu_id')->on('usuarios');
            $table->foreign('ti_usu_rol_rol_fk')->references('tr_rol_id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_roles');
    }
}
