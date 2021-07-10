<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->bigInteger('tr_mod_id');
            $table->Char('tr_uuid');
            $table->string('tr_mod_nombre');
            $table->string('tr_mod_descripcion');
            $table->bigInteger('tr_mod_usuario_creacion')->nullable();
            $table->bigInteger('tr_mod_usuario_modificacion')->nullable();
            $table->timestamp('tr_mod_fecha_creacion')->nullable();
            $table->timestamp('tr_mod_fecha_modificaion')->nullable();
            $table->bigInteger('tr_mod_estado');
            $table->boolean('tr_mod_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
