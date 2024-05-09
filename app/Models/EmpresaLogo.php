<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpresaLogo extends Model
{
    protected $table = 'empresa_logo';
    use SoftDeletes;

    protected $fillable = [
        'id',
        'id_empresa',
        'name',
        'path',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function empresa() {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }
}
