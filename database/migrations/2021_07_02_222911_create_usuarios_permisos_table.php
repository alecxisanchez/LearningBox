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
            $table->Char('tr_uuid');
            $table->bigInteger('ti_usu_per_usu_fk')->unsigned();
            $table->bigInteger('ti_usu_per_per_fk')->unsigned();
            $table->bigInteger('ti_usu_per_est_fk')->unsigned();
            $table->bigInteger('ti_usu_per_vig_fk')->unsigned();
            $table->bigInteger('ti_usu_per_usuario_creacion')->nullable();
            $table->bigInteger('ti_usu_per_usuario_modificacion')->nullable();
            $table->timestamp('ti_usu_per_fecha_creacion')->nullable();
            $table->timestamp('ti_usu_per_fecha_modificaion')->nullable();
            $table->foreign('ti_usu_per_usu_fk')->references('tr_usu_id')->on('usuarios');
            $table->foreign('ti_usu_per_per_fk')->references('tr_per_id')->on('permisos');
            $table->foreign('ti_usu_per_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('ti_usu_per_vig_fk')->references('tr_vig_id')->on('vigencias');
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
