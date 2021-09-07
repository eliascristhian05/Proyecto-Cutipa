<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request; 

class ProviderController extends Controller
{
    
    public function index()
    {
        $datos['providers']=Provider::paginate(5);
        return view('providers.index',$datos);
    }


    public function create()
    {
        return view('providers.create');
    }


    public function store(Request $request)
    {
        $campos=[
            'CI' => 'required|string|max:100',
            'name_provider' => 'required|string|max:100',
            'surnames' => 'required|string|max:100',
            'direction' => 'required|string|max:100',
            'phone' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        //$datosProvider=request()->all();
        $datosProvider=request()->except('_token');

        Provider::insert($datosProvider);
        //return response()->json($datosProvider);
        return redirect('providers')->with('Mensaje','Proveedor agregado con éxito');
    }

    
    public function show(Provider $provider)
    {
        //
    }

    
    public function edit($id)
    {
        $provider= Provider::findOrFail($id);

        return view('providers.edit',compact('provider'));
    }

    
    public function update(Request $request, $id)
    {
        $campos=[
            'CI' => 'required|string|max:100',
            'name_provider' => 'required|string|max:100',
            'surnames' => 'required|string|max:100',
            'direction' => 'required|string|max:100',
            'phone' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosProvider=request()->except(['_token','_method']);
        Provider::where('id','=',$id)->update($datosProvider);

       // $provider=Provider::findOrFail($id);
        //return view('providers.edit',compact('provider'));
        return redirect('providers')->with('Mensaje','Proveedor Modificado con éxito');
    }

    
    public function destroy($id)
    {
        Provider::destroy($id);

        //return redirect('providers');
        return redirect('providers')->with('Mensaje','Proveedor eliminado');
    }
}