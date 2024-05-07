<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    protected $table = 'pais';
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'nombre',
        'iso',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}