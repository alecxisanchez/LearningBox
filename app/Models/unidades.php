<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidades extends Model
{
    use HasFactory;
    protected $table = 'unidades';
    protected $primaryKey = 'tr_uni_id';
    protected $fillable = [
        'tr_uuid',
        'tr_uni_mod_fk',
        'tr_uni_est_fk',
        'tr_uni_vig_fk',
        'tr_uni_nombre',
        'tr_uni_descripcion',
        'tr_uni_usuario_creacion',
        'tr_uni_usuario_modificacion',
        'tr_uni_fecha_creacion',
        'tr_uni_fecha_modificaion'
    ];
    public $timestamps = false;
}
