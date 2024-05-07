<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    protected $table = 'provincia';
    use SoftDeletes;

    protected $fillable = [
        'id',
        'descripcion',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
