<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriasEmpresa extends Model
{
    protected $table = 'categorias_empresa';
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre',
        'id_padre',
        'nivel',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
