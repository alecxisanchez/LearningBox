<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVigenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vigencias', function (Blueprint $table) {
            $table->bigIncrements('tr_vig_id');
            $table->Char('tr_uuid');
            $table->string('tr_vig_nombre');
            $table->string('tr_vig_descripcion');
            $table->bigInteger('tr_vig_usuario_creacion')->nullable();
            $table->bigInteger('tr_vig_usuario_modificacion')->nullable();
            $table->timestamp('tr_vig_fecha_creacion')->nullable();
            $table->timestamp('tr_vig_fecha_modificacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vigencias');
    }
}
