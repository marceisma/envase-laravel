<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
class Register extends Controller
{
    public function index() {

        if (Auth::user()->role == 0) {
            return view('Auth\Register');
        } else {
            return view('dashboard');
        }
        
    }
    
    public function createNewUser(Request $request) {

        $user = new User();
        $user->password = \Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = 0;
        $user->save();

        return view('dashboard');
    }
}
