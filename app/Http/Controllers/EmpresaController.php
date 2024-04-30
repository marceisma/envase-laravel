<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function panel() {

        return view('App.Empresa.panel');
    }

    public function create() {

        return view('App.Empresa.create');
    }

    public function updateStore(Request $request) {

        return redirect(route('empresa.panel'));
    }
}
