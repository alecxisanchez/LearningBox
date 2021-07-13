<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class permisos
 * @package App\Models
 */
class permisos extends Model
{
    /**
     * Tables
     *
     * @var string
     */
    protected $table = 'permisos';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'tr_per_id';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'tr_per_id',
        'tr_uuid',
        'tr_per_nombre',
        'tr_per_descripcion',
        'tr_per_usuario_creacion',
        'tr_per_usuario_modificacion',
        'tr_per_fecha_creacion',
        'tr_per_fecha_modificaion',
        'tr_per_estado',
        'tr_per_vigencia'
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
    public function usuarios()
    {
        return $this->belongsToMany(usuarios::class, 'usuarios_permisos', 'per_fk', 'usu_fk');
    }

}
