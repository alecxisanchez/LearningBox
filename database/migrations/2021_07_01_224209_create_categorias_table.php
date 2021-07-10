<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('tr_cat_id');
            $table->Char('tr_uuid');
            $table->string('tr_cat_nombre');
            $table->string('tr_cat_descripcion');
            $table->bigInteger('tr_cat_usuario_creacion')->nullable();
            $table->bigInteger('tr_cat_usuario_modificacion')->nullable();
            $table->timestamp('tr_cat_fecha_creacion')->nullable();
            $table->timestamp('tr_cat_fecha_modificacion')->nullable();
            $table->bigInteger('tr_cat_estado');
            $table->boolean('tr_cat_vigencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
