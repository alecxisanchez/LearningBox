<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidosArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos_archivos', function (Blueprint $table) {
            $table->bigIncrements('tr_cont_arc_id');
            $table->Char('tr_uuid');
            $table->bigInteger('ti_arc_tiparch_fk')->unsigned();
            $table->string('tr_cont_nombre');
            $table->string('tr_cont_descripcion');
            $table->bigInteger('tr_cont_usuario_creacion')->nullable();
            $table->bigInteger('tr_cont_usuario_modificacion')->nullable();
            $table->timestamp('tr_cont_fecha_creacion')->nullable();
            $table->timestamp('tr_cont_fecha_modificaion')->nullable();
            $table->bigInteger('tr_cont_estado');
            $table->boolean('tr_cont_vigencia');
            $table->foreign('ti_arc_tiparch_fk')->references('ti_arc_tiparc_id')->on('archivos_tipo_archivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenidos_archivos');
    }
}
