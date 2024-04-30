<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }
    
}
