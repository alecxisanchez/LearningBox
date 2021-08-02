<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('tr_men_id');
            $table->Char('tr_uuid');
            $table->string('tr_men_nombre');
            $table->string('tr_men_descripcion')->nullable();
            $table->string('tr_men_ruta')->nullable();
            $table->string('tr_men_icono')->nullable();
            $table->bigInteger('tr_men_orden')->unsigned();
            $table->bigInteger('tr_men_id_padre')->unsigned();
            $table->bigInteger('tr_men_est_fk')->unsigned();
            $table->bigInteger('tr_men_vig_fk')->unsigned();
            $table->bigInteger('tr_men_usuario_creacion')->nullable();
            $table->bigInteger('tr_men_usuario_modificacion')->nullable();
            $table->timestamp('tr_men_fecha_creacion')->nullable();
            $table->timestamp('tr_men_fecha_modificaion')->nullable();
            $table->foreign('tr_men_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_men_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
