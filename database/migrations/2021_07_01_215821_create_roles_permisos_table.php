<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->bigIncrements('ti_rol_per_id');
            $table->Char('tr_uuid');
            $table->bigInteger('ti_rol_per_rol_fk')->unsigned();
            $table->bigInteger('ti_rol_per_per_fk')->unsigned();
            $table->bigInteger('ti_rol_per_usuario_creacion')->nullable();
            $table->bigInteger('ti_rol_per_usuario_modificacion')->nullable();
            $table->timestamp('ti_rol_per_fecha_creacion')->nullable();
            $table->timestamp('ti_rol_per_fecha_modificaion')->nullable();
            $table->bigInteger('ti_rol_per_vigencia');
            $table->foreign('ti_rol_per_rol_fk')->references('tr_rol_id')->on('roles');
            $table->foreign('ti_rol_per_per_fk')->references('tr_per_id')->on('permisos');
            $table->bigInteger('ti_rol_per_est_fk')->unsigned();
            $table->bigInteger('ti_rol_per_vig_fk')->unsigned();
            $table->foreign('ti_rol_per_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('ti_rol_per_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permisos');
    }
}
