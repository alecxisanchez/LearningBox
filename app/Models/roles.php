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
        'tr_rol_nombre',
        'tr_rol_descripcion',
        'tr_rol_usuario_creacion',
        'tr_rol_usuario_modificacion',
        'tr_rol_fecha_creacion',
        'tr_rol_fecha_modificaion',
        'tr_rol_estado',
        'tr_rol_vigencia'
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
        return $this->belongsToMany(permisos::class, 'roles_permisos', 'rol_fk', 'per_fk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(usuarios::class, 'usuarios_roles', 'rol_fk', 'usu_fk');
    }

}
