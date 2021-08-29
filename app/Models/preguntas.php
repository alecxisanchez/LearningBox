<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntas extends Model
{
    use HasFactory;
    protected $table = 'preguntas';
    protected $primaryKey = 'tr_preg_id';
    protected $fillable = [
        'tr_uuid',
        'tr_preg_nombre',
        'tr_preg_descripcion',
        'tr_preg_tipo_pregunta',
        'tr_preg_usuario_creacion',
        'tr_preg_usuario_modificacion',
        'tr_preg_fecha_creacion',
        'tr_preg_fecha_modificaion',
        'tr_preg_est_fk',
        'tr_preg_vig_fk',
    ];
    public $timestamps = false;
}
