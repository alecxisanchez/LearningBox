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
            $table->string('tr_cur_nombre');
            $table->string('tr_cur_descripcion');
            $table->bigInteger('tr_cur_usuario_creacion')->nullable();
            $table->bigInteger('tr_cur_usuario_modificacion')->nullable();
            $table->timestamp('tr_cur_fecha_creacion')->nullable();
            $table->timestamp('tr_cur_fecha_modificaion')->nullable();
            $table->bigInteger('tr_cur_estado');
            $table->boolean('tr_cur_vigencia');
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
