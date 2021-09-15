<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->bigIncrements('tr_rat_id');
            $table->bigInteger('tr_rat_cur_fk')->unsigned();
            $table->bigInteger('tr_rat_usu_fk')->unsigned();
            $table->bigInteger('tr_rat_estrellas')->unsigned();
            $table->bigInteger('tr_rat_usuario_creacion')->nullable();
            $table->bigInteger('tr_rat_usuario_modificacion')->nullable();
            $table->timestamp('tr_rat_fecha_creacion')->nullable();
            $table->timestamp('tr_rat_fecha_modificaion')->nullable();
            $table->foreign('tr_rat_cur_fk')->references('tr_cur_id')->on('cursos');
            $table->foreign('tr_rat_usu_fk')->references('tr_usu_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
}
