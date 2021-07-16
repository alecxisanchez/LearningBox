<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_archivos', function (Blueprint $table) {
            $table->bigIncrements('tr_tiparc_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_tiparc_est_fk')->unsigned();
            $table->bigInteger('tr_tiparc_vig_fk')->unsigned();
            $table->string('tr_tiparc_nombre');
            $table->string('tr_tiparc_descripcion');
            $table->bigInteger('tr_tiparc_usuario_creacion')->nullable();
            $table->bigInteger('tr_tiparc_usuario_modificacion')->nullable();
            $table->timestamp('tr_tiparc_fecha_creacion')->nullable();
            $table->timestamp('tr_tiparc_fecha_modificacion')->nullable();
            $table->foreign('tr_tiparc_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_tiparc_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_archivos');
    }
}
