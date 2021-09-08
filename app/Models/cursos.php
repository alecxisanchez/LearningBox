<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'tr_cur_id';
    protected $fillable = [
        'tr_uuid',
        'tr_cur_nombre',
        'tr_cur_descripcion',
        'tr_cur_usuario_creacion',
        'tr_cur_usuario_modificacion',
        'tr_cur_fecha_creacion',
        'tr_cur_fecha_modificacion',
        'tr_cur_cat_fk',
        'tr_cur_est_fk',
        'tr_cur_vig_fk',
    ];
    public $timestamps = false;
}
