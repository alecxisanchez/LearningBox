<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    use HasFactory;

    protected $table = 'estados';
    protected $primaryKey = 'tr_est_id';
    public $timestamps = false;
}
