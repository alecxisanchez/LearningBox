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
            $table->Char('tr_uuid');
            $table->bigInteger('tr_usu_est_fk')->unsigned();
            $table->bigInteger('tr_usu_vig_fk')->unsigned();
            $table->string('tr_usu_nombre');
            $table->string('tr_usu_mail')->unique();
            $table->string('tr_usu_password');
            $table->string('tr_usu_token')->nullable();
            $table->bigInteger('tr_usu_usuario_creacion')->nullable();
            $table->bigInteger('tr_usu_usuario_modificacion')->nullable();
            $table->timestamp('tr_usu_fecha_creacion')->nullable();
            $table->timestamp('tr_usu_fecha_modificaion')->nullable();
            $table->foreign('tr_usu_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_usu_vig_fk')->references('tr_vig_id')->on('vigencias');
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
