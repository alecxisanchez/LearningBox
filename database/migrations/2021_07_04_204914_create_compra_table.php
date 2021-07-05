<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('tr_com_id');
            $table->bigInteger('tr_com_id_usr_fk')->unsigned();
            $table->bigInteger('tr_com_id_est_com_fk')->unsigned();
            $table->bigInteger('tr_com_usuario_creacion')->nullable();
            $table->bigInteger('tr_com_usuario_modificacion')->nullable();
            $table->timestamp('tr_com_fecha_creacion')->nullable();
            $table->timestamp('tr_com_fecha_modificaion')->nullable();
            $table->boolean('tr_com_vigencia');
            $table->foreign('tr_com_id_usr_fk')->references('tr_usu_id')->on('usuarios');
            $table->foreign('tr_com_id_est_com_fk')->references('tr_est_com_id')->on('estado_compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
