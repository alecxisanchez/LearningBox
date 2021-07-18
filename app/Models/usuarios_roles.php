<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class usuarios_roles
 * @package App\Models
 */
class usuarios_roles extends Model
{
    /**
     * Tables
     *
     * @var string
     */
    protected $table = 'usuarios_roles';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'ti_usu_rol_id';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'ti_usu_rol_id',
        'tr_uuid',
        'ti_usu_rol_usu_fk',
        'ti_usu_rol_rol_fk',
        'ti_usu_rol_est_fk',
        'ti_usu_rol_vig_fk',
        'ti_usu_rol_usuario_creacion',
        'ti_usu_rol_usuario_modificacion',
        'ti_usu_rol_fecha_creacion',
        'ti_usu_rol_fecha_modificaion',
        'ti_usu_rol_vigencia'
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
