<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    use SoftDeletes;

    protected $fillable = [
        'id',
        'id_provincia',
        'descripcion',
        'codigo_postal',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
