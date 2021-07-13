<?php

namespace App\Models;

use App\Models\permisos;
use App\Models\roles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class usuarios
 * @package App\Models
 */
class usuarios extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * Tables
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'tr_usu_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tr_usu_id',
        'tr_uuid',
        'tr_usu_nombre',
        'tr_usu_mail',
        'tr_usu_password',
        'tr_usu_token',
        'tr_usu_usuario_creacion',
        'tr_usu_usuario_modificacion',
        'tr_usu_fecha_creacion',
        'tr_usu_fecha_modificaion',
        'tr_usu_estado',
        'tr_usu_vigencia'
    ];

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'tr_usu_password',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permisos()
    {
        return $this->belongsToMany(permisos::class, 'usuarios_permisos', 'usu_fk', 'per_fk');
    }

    /**
     * Relationship with the Role entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(roles::class, 'usuarios_roles', 'usu_fk', 'rol_fk');
    }

}
