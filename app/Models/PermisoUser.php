<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermisoUser extends Model
{
    protected $table = 'permiso_user';
    use SoftDeletes;

    protected $fillable = [
        'id',
        'codigo_permiso',
        'id_user',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
