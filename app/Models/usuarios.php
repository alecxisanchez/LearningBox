<?php

namespace App\Models;

//use App\Security\Entities\Permission;
//use App\Security\Entities\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Users\Entities
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
    protected $fillable = ['tr_usu_id', 'tr_uuid', 'tr_usu_nombre', 'tr_usu_mail', 'tr_usu_password', 'tr_usu_token', 'tr_usu_usuario_creacion',
        'tr_usu_usuario_modificacion', 'tr_usu_fecha_creacion', 'tr_usu_fecha_modificaion', 'tr_usu_estado', 'tr_usu_vigencia'];

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var bool
     */
    public $timestamps = true;

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

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions', 'id_user', 'id_permission');
    }


     * Relationship with the Role entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'id_user', 'id_role');
    }
     */
}
