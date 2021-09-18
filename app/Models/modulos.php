<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class modulos
 * @package App\Models
 */
class modulos extends Model
{
    use HasFactory;

    protected $table = 'modulos';

    protected $primaryKey = 'tr_mod_id';

    protected $fillable = [
        'tr_uuid',
        'tr_mod_nombre',
        'tr_mod_descripcion',
        'tr_mod_usuario_creacion',
        'tr_mod_usuario_modificacion',
        'tr_mod_fecha_creacion',
        'tr_mod_fecha_modificaion',
        'tr_mod_cur_fk',
        'tr_mod_est_fk',
        'tr_mod_vig_fk'
    ];

    public $timestamps = false;

    public function unidades()
    {
        return $this->hasMany(unidades::class, 'tr_uni_mod_fk', 'tr_mod_id');
    }

}
