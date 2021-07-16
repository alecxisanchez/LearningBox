<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransbankSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transbank_set', function (Blueprint $table) {
            $table->bigIncrements('tr_trsbak_set_id');
            $table->Char('tr_uuid');
            $table->float('tr_trsbak_set_amount');
            $table->integer('tr_trsbak_set_status');
            $table->string('tr_trsbak_set_message');
            $table->string('tr_trsbak_set_token');
            $table->string('tr_trsbak_set_next_page');
            $table->string('tr_trsbak_set_currency');
            $table->bigInteger('tr_trsbak_set_usuario_creacion')->nullable();
            $table->bigInteger('tr_trsbak_set_usuario_modificacion')->nullable();
            $table->timestamp('tr_trsbak_set_fecha_creacion')->nullable();
            $table->timestamp('tr_trsbak_set_fecha_modificaion')->nullable();
            $table->bigInteger('tr_trsbak_set_est_fk')->unsigned();
            $table->bigInteger('tr_trsbak_set_vig_fk')->unsigned();
            $table->foreign('tr_trsbak_set_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_trsbak_set_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transbank_set');
    }
}
