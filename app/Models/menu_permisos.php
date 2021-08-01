<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class menu_permisos
 * @package App\Models
 */
class menu_permisos extends Model
{
    /**
     * Tables
     *
     * @var string
     */
    protected $table = 'menu_permisos';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'ti_men_per_id';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'ti_men_per_id',
        'tr_uuid',
        'ti_men_per_men_fk',
        'ti_men_per_per_fk',
        'ti_men_per_est_fk',
        'ti_men_per_vig_fk',
        'ti_men_per_usuario_creacion',
        'ti_men_per_usuario_modificacion',
        'ti_men_per_fecha_creacion',
        'ti_men_per_fecha_modificaion'
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
