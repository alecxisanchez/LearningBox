<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_curso', function (Blueprint $table) {
            $table->bigIncrements('tr_com_cur_id');
            $table->Char('tr_uuid');
            $table->bigInteger('tr_com_cur_com_fk')->unsigned();
            $table->bigInteger('tr_com_cur_cur_fk')->unsigned();
            $table->bigInteger('tr_com_cur_est_fk')->unsigned();
            $table->bigInteger('tr_com_cur_vig_fk')->unsigned();
            $table->bigInteger('tr_com_cur_usuario_creacion')->nullable();
            $table->bigInteger('tr_com_cur_usuario_modificacion')->nullable();
            $table->timestamp('tr_com_cur_fecha_creacion')->nullable();
            $table->timestamp('tr_com_cur_fecha_modificaion')->nullable();
            $table->foreign('tr_com_cur_com_fk')->references('tr_com_id')->on('compra');
            $table->foreign('tr_com_cur_cur_fk')->references('tr_cur_id')->on('cursos');
            $table->foreign('tr_com_cur_est_fk')->references('tr_est_id')->on('estados');
            $table->foreign('tr_com_cur_vig_fk')->references('tr_vig_id')->on('vigencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra_curso');
    }
}
