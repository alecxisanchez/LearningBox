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
            $table->boolean('tr_trsbak_set_vigencia');
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
