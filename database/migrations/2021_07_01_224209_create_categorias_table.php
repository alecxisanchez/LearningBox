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
            $table->bigInteger('tr_cat_est_fk')->unsigned();
            $table->bigInteger('tr_cat_vig_fk')->unsigned();
            $table->string('tr_cat_nombre');
            $table->string('tr_cat_descripcion');
            $table->bigInteger('tr_cat_usuario_creacion')->nullable();
            $table->bigInteger('tr_cat_usuario_modificacion')->nullable();
            $table->timestamp('tr_cat_fecha_creacion')->nullable();
            $table->timestamp('tr_cat_fecha_modificacion')->nullable();
            $table->foreign('tr_cat_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_cat_vig_fk')->references('tr_vig_id')->on('vigencias');
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
