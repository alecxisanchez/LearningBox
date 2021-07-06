<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesiones', function (Blueprint $table) {
            $table->bigIncrements('tr_ses_id');
            $table->bigInteger('usu_fk')->unsigned();
            $table->string('direccion_ip')->nullable();
            $table->string('usuario_agente')->nullable();
            $table->string('carga_util')->nullable();
            $table->string('ultima_actividad')->nullable();
            $table->foreign('usu_fk')->references('tr_usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesiones');
    }
}
