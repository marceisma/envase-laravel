<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    protected $table = 'empresa';
    use SoftDeletes;

    protected $fillable = [
        'id',
        'cuit',
        'codigo_iae',
        'razon_social',
        'nombre_fantasia',
        'id_pais',
        'id_provincia',
        'id_ciudad',
        'provincia',
        'ciudad',
        'codigo_postal',
        'direccion',
        'telefono',
        'whatsapp',
        'email',
        'web',
        'fecha_alta',
        'fecha_baja',
        'recibe_email',
        'descripcion',
        'exportador',
        'importador',
        'representante',
        'distribuidor',
        'fabricante',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    function categoriaEmpresa() {
        return $this->hasMany(CategoriaEmpresa::class, 'id_empresa', 'id');
    }
}