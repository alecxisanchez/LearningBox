<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('tr_usu_id');
            $table->string('tr_usu_nombre');
            $table->string('tr_usu_mail')->unique();
            $table->string('tr_usu_password');
            $table->string('tr_usu_token');
            $table->bigInteger('tr_usu_usuario_creacion')->nullable();
            $table->bigInteger('tr_usu_usuario_modificacion')->nullable();
            $table->timestamp('tr_usu_fecha_creacion')->nullable();
            $table->timestamp('tr_usu_fecha_modificaion')->nullable();
            $table->bigInteger('tr_usu_estado');
            $table->boolean('tr_usu_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
