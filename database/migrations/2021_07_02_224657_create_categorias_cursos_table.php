<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_cursos', function (Blueprint $table) {
            $table->bigIncrements('ti_cat_cur_id');
            $table->Char('tr_uuid');
            $table->bigInteger('ti_cat_cur_cat_fk')->unsigned();
            $table->bigInteger('ti_cat_cur_cur_fk')->unsigned();
            $table->bigInteger('ti_cat_cur_est_fk')->unsigned();
            $table->bigInteger('ti_cat_cur_vig_fk')->unsigned();
            $table->bigInteger('ti_cat_cur_usuario_creacion')->nullable();
            $table->bigInteger('ti_cat_cur_usuario_modificacion')->nullable();
            $table->timestamp('ti_cat_cur_fecha_creacion')->nullable();
            $table->timestamp('ti_cat_cur_fecha_modificaion')->nullable();
            $table->foreign('ti_cat_cur_cat_fk')->references('tr_cat_id')->on('categorias');
            $table->foreign('ti_cat_cur_cur_fk')->references('tr_cur_id')->on('cursos');
            $table->foreign('ti_cat_cur_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('ti_cat_cur_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_cursos');
    }
}
