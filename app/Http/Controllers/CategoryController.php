<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request; 

class CategoryController extends Controller
{
    
    public function index()
    {
        $datos['categories']=Category::paginate(5);
        return view('categories.index',$datos);
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $campos=[
            'description' => 'required|string|max:100',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        //$datosCategory=request()->all();
        $datosCategory=request()->except('_token');

        Category::insert($datosCategory);
        //return response()->json($datosProvider);
        return redirect('categories')->with('Mensaje','Categoria agregado con éxito');
    }

    
    public function show(Category $category)
    {
        //
    }

    
    public function edit($id)
    {
        $category= Category::findOrFail($id);

        return view('categories.edit',compact('category'));
    }

    
    public function update(Request $request, $id)
    {
        $campos=[
            'description' => 'required|string|max:100',
            
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosCategory=request()->except(['_token','_method']);
        Category::where('id','=',$id)->update($datosCategory);

       // $categories=Category::findOrFail($id);
        //return view('categories.edit',compact('category'));
        return redirect('categories')->with('Mensaje','Categoria Modificado con éxito');
    }

    
    public function destroy($id)
    {
        Category::destroy($id);

        //return redirect('categories');
        return redirect('categories')->with('Mensaje','Categoria eliminado');
    }
}