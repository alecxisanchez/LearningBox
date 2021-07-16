<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('tr_cur_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_cur_est_fk')->unsigned();
            $table->bigInteger('tr_cur_vig_fk')->unsigned();
            $table->string('tr_cur_nombre');
            $table->string('tr_cur_descripcion');
            $table->bigInteger('tr_cur_usuario_creacion')->nullable();
            $table->bigInteger('tr_cur_usuario_modificacion')->nullable();
            $table->timestamp('tr_cur_fecha_creacion')->nullable();
            $table->timestamp('tr_cur_fecha_modificaion')->nullable();
            $table->foreign('tr_cur_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_cur_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
