<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracion', function (Blueprint $table) {
            $table->bigIncrements('tr_conf_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_conf_est_fk')->unsigned();
            $table->bigInteger('tr_conf_vig_fk')->unsigned();
            $table->foreign('tr_conf_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_conf_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracion');
    }
}
