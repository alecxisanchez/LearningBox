<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class DataCargaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Insert some stuff
        DB::table('usuarios')->insert(
            array(
                'tr_usu_id' => 1,
                'tr_uuid' => Uuid::uuid4(),
                'tr_usu_nombre' => 'Alecxi Sanchez',
                'tr_usu_mail' => 'alecxisanchez2007@gmail.com',
                'tr_usu_password' => md5('12345678'),
                'tr_usu_token' => null,
                'tr_usu_usuario_creacion' => null,
                'tr_usu_usuario_modificacion' => null,
                'tr_usu_fecha_creacion' => null,
                'tr_usu_fecha_modificaion' => null,
                'tr_usu_est_fk' => 1,
                'tr_usu_vig_fk' => 1
            )
        );
        //
        DB::table('usuarios')->insert(
            array(
                'tr_usu_id' => 2,
                'tr_uuid' => Uuid::uuid4(),
                'tr_usu_nombre' => 'Carlos Lara',
                'tr_usu_mail' => 'carlos.fabianlara@gmail.com',
                'tr_usu_password' => md5('12345678'),
                'tr_usu_token' => null,
                'tr_usu_usuario_creacion' => null,
                'tr_usu_usuario_modificacion' => null,
                'tr_usu_fecha_creacion' => null,
                'tr_usu_fecha_modificaion' => null,
                'tr_usu_est_fk' => 1,
                'tr_usu_vig_fk' => 1
            )
        );
        //
        DB::table('usuarios')->insert(
            array(
                'tr_usu_id' => 3,
                'tr_uuid' => Uuid::uuid4(),
                'tr_usu_nombre' => 'Elio Martins',
                'tr_usu_mail' => 'elio.omar.martins@gmail.com',
                'tr_usu_password' => md5('12345678'),
                'tr_usu_token' => null,
                'tr_usu_usuario_creacion' => null,
                'tr_usu_usuario_modificacion' => null,
                'tr_usu_fecha_creacion' => null,
                'tr_usu_fecha_modificaion' => null,
                'tr_usu_est_fk' => 1,
                'tr_usu_vig_fk' => 1
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
