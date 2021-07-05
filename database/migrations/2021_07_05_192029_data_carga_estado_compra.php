<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataCargaEstadoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('estado_compra')->insert(
            array(
                'tr_est_com_id' => 1,
                'tr_est_com_nombre' => 'Aprobada',
                'tr_est_com_descripcion' => 'Estado de la compra aprobado',
                'tr_est_com_usuario_creacion' => null,
                'tr_est_com_usuario_modificacion' => null,
                'tr_est_com_fecha_creacion' => null,
                'tr_est_com_fecha_modificaion' => null,
                'tr_est_com_vigencia' => 1
            )
        );
        //
        DB::table('estado_compra')->insert(
            array(
                'tr_est_com_id' => 2,
                'tr_est_com_nombre' => 'Rechazada',
                'tr_est_com_descripcion' => 'Estado de la compra Rechazada',
                'tr_est_com_usuario_creacion' => null,
                'tr_est_com_usuario_modificacion' => null,
                'tr_est_com_fecha_creacion' => null,
                'tr_est_com_fecha_modificaion' => null,
                'tr_est_com_vigencia' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
