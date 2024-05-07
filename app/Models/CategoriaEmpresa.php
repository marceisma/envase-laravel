<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaEmpresa extends Model
{
    protected $table = 'categoria_empresa';
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_categorias_empresa',
        'id_empresa',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function empresa() {
        return $this->hasOne(Empresa::class, 'id_empresa', 'id');
    }

    function categoriasEmpresa() {
        return $this->hasOne(CategoriasEmpresa::class, 'id_categorias_empresa', 'id');
    }
}
