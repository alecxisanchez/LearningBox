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
            $table->bigInteger('tr_cont_arc_tiparch_fk')->unsigned();
            $table->bigInteger('tr_cont_arc_est_fk')->unsigned();
            $table->bigInteger('tr_cont_arc_vig_fk')->unsigned();
            $table->string('tr_cont_nombre');
            $table->string('tr_cont_descripcion');
            $table->bigInteger('tr_cont_usuario_creacion')->nullable();
            $table->bigInteger('tr_cont_usuario_modificacion')->nullable();
            $table->timestamp('tr_cont_fecha_creacion')->nullable();
            $table->timestamp('tr_cont_fecha_modificaion')->nullable();
            $table->foreign('tr_cont_arc_tiparch_fk')->references('ti_arc_tiparc_id')->on('archivos_tipo_archivos');
            $table->foreign('tr_cont_arc_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_cont_arc_vig_fk')->references('tr_vig_id')->on('vigencias');
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
