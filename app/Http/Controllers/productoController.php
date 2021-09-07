<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Product;
use Illuminate\Http\Request;

class productocontroller extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('producto.index', [
            'products'=>Product::get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create', [
            'products'=>new Product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $riot=new Product;
        $riot->name =$request->get('name');
        $riot->description =$request->get('description');
        $riot->price =$request->get('price');
        
       
        if ($request->hasFile('imagen')){
            $files=$request->file('imagen');
            $files->move(public_path().'/img/',$files->getClientOriginalName());
               $riot->imagen=$files->getClientOriginalName();
           }
           $riot->save();
    /*$fields=request()->validate([
    'nombre'=>'required',
    'descripcion'=>'required',
    'precio'=>'required',
    'cantidad'=>'required',
    'imagen'=>'required',
       ]);
       Producto::create($fields);*/
       return redirect()->route('products')->with('status','Registro exitoso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit', [
            'producto'=>$producto
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  /public function update(Producto $producto)
    {
        $fields=request()->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',

            
                   ]);
                   $producto->update($fields);
                   return redirect()->route('producto.index')->with('status','editado con exito.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detalle(){
        return view('producto.detalle', [
            'productos'=>Producto::get()
        ]);
        
     
    }

}