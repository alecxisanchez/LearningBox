<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('tr_rol_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_rol_est_fk')->unsigned();
            $table->bigInteger('tr_rol_vig_fk')->unsigned();
            $table->string('tr_rol_nombre');
            $table->string('tr_rol_descripcion');
            $table->bigInteger('tr_rol_usuario_creacion')->nullable();
            $table->bigInteger('tr_rol_usuario_modificacion')->nullable();
            $table->timestamp('tr_rol_fecha_creacion')->nullable();
            $table->timestamp('tr_rol_fecha_modificaion')->nullable();
            $table->foreign('tr_rol_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_rol_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
