<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $primaryKey = 'tr_rat_id';
    protected $fillable = [
        'tr_rat_cur_fk',
        'tr_rat_usu_fk',
        'tr_rat_estrellas',
        'tr_rat_usuario_creacion',
        'tr_rat_usuario_modificacion',
        'tr_rat_fecha_creacion',
        'tr_rat_fecha_modificaion'
    ];
    public $timestamps = false;
}
