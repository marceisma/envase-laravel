<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function panel() {

        $viewData = [
            'empresas' => Empresa::orderBy('razon_social')->paginate(20)
        ];

        return view('App.Empresa.panel', ['viewData' => $viewData]);
    }

    public function create($id = null) {

        if ($id) {
            $empresa = \App\Models\Empresa::find($id);

            $empresa->categorias = \App\Models\CategoriaEmpresa::
                leftJoin('categorias_empresa','categorias_empresa.id','=','categoria_empresa.id_categorias_empresa')    
                ->select('categoria_empresa.id','categorias_empresa.nombre')
                ->where('categoria_empresa.id_empresa','=',$id)
                ->get()->toArray();

            $empresa->logo = \App\Models\EmpresaLogo::where('id_empresa','=',$empresa->id)->orderBy('created_at','desc')->first();

            
        } else {
            $empresa = null;
        }
        

        $viewData = [
            'provincias' => \App\Models\Provincia::all()->toArray(),
            'ciudades' => \App\Models\Ciudad::all()->toArray(),
            'paises' => \App\Models\Pais::all()->toArray(),
            'categorias' => \App\Models\CategoriasEmpresa::where('nivel','=',2)->get(),
            'empresa' => $empresa
        ];

        return view('App.Empresa.create', ['viewData' => $viewData]);
    }

    public function updateStore(Request $request) {        

        if ($request->id) {
            $item = Empresa::find($request->id);

            $categorias = \App\Models\CategoriaEmpresa::
                leftJoin('categorias_empresa','categorias_empresa.id','=','categoria_empresa.id_categorias_empresa')    
                ->select('categoria_empresa.id')
                ->where('id_empresa','=',$item['id'])
                ->get();

            
            for ($i=0; $i < count($categorias); $i++) { 
//                dd('categoria'.$categorias[$i]['id'], $request->get('categoria'.$categorias[$i]['id']));
                if ($request->get('categoria'.$categorias[$i]['id']) == '1') {
                    $categorias[$i]->delete();
                }
                
            }
        } else {
            $item = new Empresa();
        }

        

        $item->cuit = $request->cuit;
        $item->codigo_iae = $request->codigo_iae;
        $item->razon_social = $request->razon_social;
        $item->nombre_fantasia = $request->nombre_fantasia;

        $item->id_pais = $request->id_pais;
        if ($item->id_pais == '11') {
            $item->id_provincia = $request->id_provincia;
            $item->id_ciudad = $request->id_ciudad;
        } else {
            $item->provincia = $request->provincia;
            $item->ciudad = $request->ciudad;
        }
        
        $item->codigo_postal = $request->codigo_postal;
        $item->direccion = $request->direccion;
        $item->telefono = $request->telefono;
        $item->whatsapp = $request->whatsapp;
        $item->email = $request->email;
        $item->web = $request->web;
        $item->fecha_alta = $request->fecha_alta;
        $item->fecha_baja = $request->fecha_baja;
        $item->save();



        if ($request->logo) {
            $newFile = new \App\Models\EmpresaLogo();
            $newFile->id_empresa = $item->id;
            $newFile->name = $request->logo->getClientOriginalName();
            $newFile->path = $request->logo->store("public/empresa/logo");
            $newFile->path = str_replace("public/empresa/logo/", '', $newFile->path);
            $newFile->save();
        }

        return redirect(route('empresa.panel'));
    }
}
