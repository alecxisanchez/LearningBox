<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_compra', function (Blueprint $table) {
            $table->bigIncrements('tr_est_com_id');
            $table->string('tr_est_com_nombre');
            $table->string('tr_est_com_descripcion');
            $table->bigInteger('tr_est_com_usuario_creacion')->nullable();
            $table->bigInteger('tr_est_com_usuario_modificacion')->nullable();
            $table->timestamp('tr_est_com_fecha_creacion')->nullable();
            $table->timestamp('tr_est_com_fecha_modificaion')->nullable();
            $table->boolean('tr_est_com_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_compra');
    }
}
