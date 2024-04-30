<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Permission_1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $permisos = \App\Models\User::
            leftJoin('permiso_user','permiso_user.id_user','=','users.id')
            ->leftJoin('permiso','permiso.id','=','permiso_user.id')
            ->select('permiso.codigo', 'permiso.descripcion')
            ->where('users.id','=',Auth::user()->id)
            ->get()->toArray();

        if (in_array('1', array_column($permisos, 'codigo'))) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
