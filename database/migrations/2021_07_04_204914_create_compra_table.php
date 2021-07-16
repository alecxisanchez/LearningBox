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
            $table->Char('tr_uuid');
            $table->bigInteger('tr_com_usr_fk')->unsigned();
            $table->bigInteger('tr_com_est_com_fk')->unsigned();
            $table->bigInteger('tr_com_trn_get_fk')->unsigned();
            $table->bigInteger('tr_com_trn_set_fk')->unsigned();
            $table->bigInteger('tr_com_est_fk')->unsigned();
            $table->bigInteger('tr_com_vig_fk')->unsigned();
            $table->bigInteger('tr_com_usuario_creacion')->nullable();
            $table->bigInteger('tr_com_usuario_modificacion')->nullable();
            $table->timestamp('tr_com_fecha_creacion')->nullable();
            $table->timestamp('tr_com_fecha_modificaion')->nullable();
            $table->foreign('tr_com_usr_fk')->references('tr_usu_id')->on('usuarios');
            $table->foreign('tr_com_est_com_fk')->references('tr_est_com_id')->on('estado_compra');
            $table->foreign('tr_com_trn_get_fk')->references('tr_trsbak_get_id')->on('transbank_get');
            $table->foreign('tr_com_trn_set_fk')->references('tr_trsbak_set_id')->on('transbank_set');
            $table->foreign('tr_com_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_com_vig_fk')->references('tr_vig_id')->on('vigencias');;
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
