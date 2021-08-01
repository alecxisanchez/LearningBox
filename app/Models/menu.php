<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class menu
 * @package App\Models
 */
class menu extends Model
{
    /**
     * Tables
     *
     * @var string
     */
    protected $table = 'menu';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'tr_men_id';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'tr_men_id',
        'tr_uuid',
        'tr_men_nombre',
        'tr_men_descripcion',
        'tr_men_ruta',
        'tr_men_icono',
        'tr_men_orden',
        'tr_men_id_padre',
        'tr_men_est_fk',
        'tr_men_vig_fk',
        'tr_men_usuario_creacion',
        'tr_men_usuario_modificacion',
        'tr_men_fecha_creacion',
        'tr_men_fecha_modificaion'
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
        return $this->belongsToMany(permisos::class, 'menu_permisos', 'ti_men_per_men_fk', 'ti_men_per_per_fk');
    }

}
