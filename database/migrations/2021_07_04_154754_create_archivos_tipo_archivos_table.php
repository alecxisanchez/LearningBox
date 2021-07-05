<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTipoArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_tipo_archivos', function (Blueprint $table) {
            $table->bigIncrements('ti_arc_tiparc_id');
            $table->bigInteger('ti_arc_tiparch_arc_fk')->unsigned();
            $table->bigInteger('ti_arc_tiparch_tiparc_fk')->unsigned();
            $table->bigInteger('ti_arc_tiparc_usuario_creacion')->nullable();
            $table->bigInteger('ti_arc_tiparc_usuario_modificacion')->nullable();
            $table->timestamp('ti_arc_tiparc_fecha_creacion')->nullable();
            $table->timestamp('ti_arc_tiparc_fecha_modificaion')->nullable();
            $table->boolean('ti_arc_tiparc_vigencia');
            $table->foreign('ti_arc_tiparch_arc_fk')->references('tr_arc_id')->on('archivos');
            $table->foreign('ti_arc_tiparch_tiparc_fk')->references('tr_tiparc_id')->on('tipo_archivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_tipo_archivos');
    }
}
