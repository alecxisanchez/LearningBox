<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->bigIncrements('tr_mod_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_mod_cur_fk')->unsigned();
            $table->bigInteger('tr_mod_est_fk')->unsigned();
            $table->bigInteger('tr_mod_vig_fk')->unsigned();
            $table->string('tr_mod_nombre');
            $table->string('tr_mod_descripcion');
            $table->bigInteger('tr_mod_usuario_creacion')->nullable();
            $table->bigInteger('tr_mod_usuario_modificacion')->nullable();
            $table->timestamp('tr_mod_fecha_creacion')->nullable();
            $table->timestamp('tr_mod_fecha_modificaion')->nullable();
            $table->foreign('tr_mod_cur_fk')->references('tr_cur_id')->on('cursos');
            $table->foreign('tr_mod_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_mod_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
