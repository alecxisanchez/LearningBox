<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->bigIncrements('tr_est_id');
            $table->Char('tr_uuid');
            $table->string('tr_est_nombre');
            $table->string('tr_est_descripcion');
            $table->bigInteger('tr_est_usuario_creacion')->nullable();
            $table->bigInteger('tr_est_usuario_modificacion')->nullable();
            $table->timestamp('tr_est_fecha_creacion')->nullable();
            $table->timestamp('tr_est_fecha_modificacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
