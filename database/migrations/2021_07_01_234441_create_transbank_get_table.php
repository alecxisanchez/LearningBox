<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransbankGetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transbank_get', function (Blueprint $table) {
            $table->bigIncrements('tr_trsbak_get_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_trsbak_get_est_fk')->unsigned();
            $table->bigInteger('tr_trsbak_get_vig_fk')->unsigned();
            $table->string('tr_trsbak_get_token');
            $table->timestamp('tr_trsbak_get_accounting_date');
            $table->string('tr_trsbak_get_authorization_code');
            $table->string('tr_trsbak_get_payment_type_code');
            $table->string('tr_trsbak_get_response_code');
            $table->string('tr_trsbak_get_shares_number');
            $table->string('tr_trsbak_get_amount');
            $table->string('tr_trsbak_get_card_number');
            $table->string('tr_trsbak_get_card_expiration_date');
            $table->string('tr_trsbak_get_vci');
            $table->integer('tr_trsbak_get_session_id');
            $table->bigInteger('tr_trsbak_get_usuario_creacion')->nullable();
            $table->bigInteger('tr_trsbak_get_usuario_modificacion')->nullable();
            $table->timestamp('tr_trsbak_get_fecha_creacion')->nullable();
            $table->timestamp('tr_trsbak_get_fecha_modificaion')->nullable();
            $table->foreign('tr_trsbak_get_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_trsbak_get_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transbank_get');
    }
}
