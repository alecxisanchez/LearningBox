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
            $table->string('tr_tiparc_nombre');
            $table->string('tr_tiparc_descripcion');
            $table->bigInteger('tr_tiparc_usuario_creacion')->nullable();
            $table->bigInteger('tr_tiparc_usuario_modificacion')->nullable();
            $table->timestamp('tr_tiparc_fecha_creacion')->nullable();
            $table->timestamp('tr_tiparc_fecha_modificacion')->nullable();
            $table->bigInteger('tr_tiparc_estado');
            $table->boolean('tr_tiparc_vigencia');
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
