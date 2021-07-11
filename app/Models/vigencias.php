<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vigencias extends Model
{
    use HasFactory;

    protected $table = 'vigencias';
    protected $primaryKey = 'tr_vig_id';
    public $timestamps = false;
}
