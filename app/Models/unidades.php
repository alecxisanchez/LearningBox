<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidades extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'tr_cat_id';
    protected $fillable = [
        'tr_uuid',
        'tr_cat_nombre',
        'tr_cat_descripcion',
        'tr_cat_usuario_creacion',
        'tr_cat_usuario_modificacion',
        'tr_cat_fecha_creacion',
        'tr_cat_fecha_modificaion',
        'tr_cat_est_fk',
        'tr_cat_vig_fk',
    ];
    public $timestamps = false;
}
