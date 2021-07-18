<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class usuarios_permisos
 * @package App\Models
 */
class usuarios_permisos extends Model
{
    /**
     * Tables
     *
     * @var string
     */
    protected $table = 'usuarios_permisos';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'ti_usu_per_id';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'ti_usu_per_id',
        'tr_uuid',
        'ti_usu_per_usu_fk',
        'ti_usu_per_per_fk',
        'ti_usu_per_est_fk',
        'ti_usu_per_vig_fk',
        'ti_usu_per_usuario_creacion',
        'ti_usu_per_usuario_modificacion',
        'ti_usu_per_fecha_creacion',
        'ti_usu_per_fecha_modificaion'
    ];

    /**
     * Var Incrementing
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
