<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $datos['clients']=Client::paginate(5);
        return view('clients.index',$datos);
    }


    public function create()
    {
        return view('clients.create');
    }


    public function store(Request $request)
    {
        $campos=[

            'name' => 'required|string|max:100',
            'surnames' => 'required|string|max:100',
            'direction' => 'required|string|max:100',
            'phone' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        //$datosClient=request()->all();
        $datosClient=request()->except('_token');

        Client::insert($datosClient);
        //return response()->json($datosClient);
        return redirect('clients')->with('Mensaje','Cliente agregado con éxito');
    }

    
    public function show(Client $client)
    {
        //
    }

    
    public function edit($id)
    {
        $client= Client::findOrFail($id);

        return view('clients.edit',compact('client'));
    }

    
    public function update(Request $request, $id)
    {
        $campos=[
            'name' => 'required|string|max:100',
            'surnames' => 'required|string|max:100',
            'direction' => 'required|string|max:100',
            'phone' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosClient=request()->except(['_token','_method']);
        Client::where('id','=',$id)->update($datosClient);

       // $client=Client::findOrFail($id);
        //return view('clients.edit',compact('client'));
        return redirect('clients')->with('Mensaje','Cliente Modificado con éxito');
    }

    
    public function destroy($id)
    {
        Client::destroy($id);

        //return redirect('clients');
        return redirect('clients')->with('Mensaje','Cliente eliminado');
    }
}