<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    use HasFactory;
    protected $table = 'respuestas';
    protected $primaryKey = 'tr_res_id';
    protected $fillable = [
        'tr_uuid',
        'tr_res_nombre',
        'tr_res_descripcion',
        'tr_res_orden',
        'tr_res_respuesta_correcta',
        'tr_res_usuario_creacion',
        'tr_res_usuario_modificacion',
        'tr_res_fecha_creaciontr_res_fecha_creacion',
        'tr_res_fecha_modificaion',
        'tr_res_preg_fk',
        'tr_res_est_fk',
        'tr_res_vig_fk',
    ];
    public $timestamps = false;
}
