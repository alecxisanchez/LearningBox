<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DataCargaVigencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('vigencias')->insert(
            array(
                'tr_vig_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_vig_nombre' => 'Vigente',
                'tr_vig_descripcion' => 'Vigente',
                'tr_vig_usuario_creacion' => null,
                'tr_vig_usuario_modificacion' => null,
                'tr_vig_fecha_creacion' => null,
                'tr_vig_fecha_modificacion' => null
                )
            );
            //
        DB::table('vigencias')->insert(
            array(
                'tr_vig_id' => 2,
                'tr_uuid' => Uuid::uuid4(),
                'tr_vig_nombre' => 'No Vigente',
                'tr_vig_descripcion' => 'No Vigente',
                'tr_vig_usuario_creacion' => null,
                'tr_vig_usuario_modificacion' => null,
                'tr_vig_fecha_creacion' => null,
                'tr_vig_fecha_modificacion' => null
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
