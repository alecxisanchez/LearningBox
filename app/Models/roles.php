<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class roles
 * @package App\Models
 */
class roles extends Model
{
    /**
     * Tables
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'tr_rol_id';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'tr_rol_id',
        'tr_uuid',
        'tr_rol_est_fk',
        'tr_rol_nombre',
        'tr_rol_vig_fk',
        'tr_rol_descripcion',
        'tr_rol_usuario_creacion',
        'tr_rol_usuario_modificacion',
        'tr_rol_fecha_creacion',
        'tr_rol_fecha_modificaion'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permisos()
    {
        return $this->belongsToMany(permisos::class, 'roles_permisos', 'ti_rol_per_rol_fk', 'ti_rol_per_per_fk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(usuarios::class, 'usuarios_roles', 'ti_usu_rol_rol_fk', 'ti_usu_rol_usu_fk');
    }

}
