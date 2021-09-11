<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archivos extends Model
{
    use HasFactory;
    protected $table = 'archivos';
    protected $primaryKey = 'tr_arc_id';
    protected $fillable = [
        'tr_uuid',
        'tr_arc_nombre',
        'tr_arc_descripcion',
        'tr_arc_nombre_sistema',
        'tr_arc_fecha_carga',
        'tr_arc_usuario_creacion',
        'tr_arc_usuario_modificacion',
        'tr_arc_fecha_creacion',
        'tr_arc_fecha_modificaion',
        'tr_arc_est_fk',
        'tr_arc_vig_fk',
    ];
    public $timestamps = false;
}
