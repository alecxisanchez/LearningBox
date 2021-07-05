<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->bigIncrements('tr_arc_id');
            $table->string('tr_arc_nombre');
            $table->string('tr_arc_descripcion');
            $table->string('tr_arc_nombre_sistema');
            $table->timestamp('tr_arc_fecha_carga');
            $table->bigInteger('tr_arc_usuario_creacion')->nullable();
            $table->bigInteger('tr_arc_usuario_modificacion')->nullable();
            $table->timestamp('tr_arc_fecha_creacion')->nullable();
            $table->timestamp('tr_arc_fecha_modificaion')->nullable();
            $table->bigInteger('tr_arc_estado');
            $table->boolean('tr_arc_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos');
    }
}
