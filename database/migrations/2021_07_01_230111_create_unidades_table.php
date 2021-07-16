<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->bigIncrements('tr_uni_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_uni_mod_fk')->unsigned();
            $table->bigInteger('tr_uni_est_fk')->unsigned();
            $table->bigInteger('tr_uni_vig_fk')->unsigned();
            $table->string('tr_uni_nombre');
            $table->string('tr_uni_descripcion');
            $table->bigInteger('tr_uni_usuario_creacion')->nullable();
            $table->bigInteger('tr_uni_usuario_modificacion')->nullable();
            $table->timestamp('tr_uni_fecha_creacion')->nullable();
            $table->timestamp('tr_uni_fecha_modificaion')->nullable();;
            $table->foreign('tr_uni_mod_fk')->references('tr_mod_id')->on('modulos');
            $table->foreign('tr_uni_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_uni_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades');
    }
}
