<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidosUnidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos_unidad', function (Blueprint $table) {
            $table->bigIncrements('ti_cont_uni_id');
            $table->Char('tr_uuid');
            $table->bigInteger('ti_cont_uni_arc_fk')->unsigned();
            $table->bigInteger('ti_cont_uni_uni_fk')->unsigned();
            $table->bigInteger('ti_cont_uni_est_fk')->unsigned();
            $table->bigInteger('ti_cont_uni_vig_fk')->unsigned();
            $table->bigInteger('ti_cont_uni_usuario_creacion')->nullable();
            $table->bigInteger('ti_cont_uni_usuario_modificacion')->nullable();
            $table->timestamp('ti_cont_uni_fecha_creacion')->nullable();
            $table->timestamp('ti_cont_uni_fecha_modificaion')->nullable();
            $table->foreign('ti_cont_uni_arc_fk')->references('tr_cont_arc_id')->on('contenidos_archivos');
            $table->foreign('ti_cont_uni_uni_fk')->references('tr_uni_id')->on('unidades');
            $table->foreign('ti_cont_uni_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('ti_cont_uni_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenidos_unidad');
    }
}
