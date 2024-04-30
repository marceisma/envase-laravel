<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermisoUser extends Model
{
    protected $table = 'permiso_user';
    use SoftDeletes;
}
