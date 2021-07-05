<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->bigIncrements('tr_per_id');
            $table->string('tr_per_nombre');
            $table->string('tr_per_descripcion');
            $table->bigInteger('tr_per_usuario_creacion')->nullable();
            $table->bigInteger('tr_per_usuario_modificacion')->nullable();
            $table->timestamp('tr_per_fecha_creacion')->nullable();
            $table->timestamp('tr_per_fecha_modificaion')->nullable();
            $table->bigInteger('tr_per_estado');
            $table->boolean('tr_per_vigencia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
