<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use App\Models\Provider;
use App\Models\Employee;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppings=Shopping::with("provider","employee")->paginate(15);
        return view("shopping.index", compact("shoppings"),[
            "providers"=>Provider::get(),
            "employees"=>Employee::get()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers=Provider::get();
        $employees=Employee::get();
        $shopping=new Shopping;
        $title= __("Añadir Shopping");
        $textButton=__("Crear");
        $route=route("shopping.store");
        return view("shopping.create", compact("title", "textButton", "route","shopping","providers","employees"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "id_provider"=>"required",
            "id_employee"=>"required",
            "shopping_date"=>"required",
            "shopping_quantity"=>"required"
        ]);
        Shopping::create($request->only("id_provider","id_employee","shopping_date","shopping_quantity"));
        return redirect(route("shopping.index"))
            ->with("success", __("Shopping registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping $shopping)
    {
        $update=true;
        $title= __("Editar datos de la Compra");
        $providers=Provider::get();
        $employees=Employee::get();
        $textButton= __("Actualizar");
        $route=route("shopping.update",["shopping"=>$shopping]);
        return view("shopping.edit", compact("update","title","providers","employees","shopping","textButton","route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopping $shopping)
    {
        $this->validate($request,[
            "id_provider"=>"required",
            "id_employee"=>"required",
            "shopping_date"=>"required",
            "shopping_quantity"=>"required",
        ]);
        $shopping->fill($request->only("id_provider","id_employee","shopping_date","shopping_quantity"))->save();
        return redirect(route("shopping.index"))->with("success", __("Datos actualizados"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
        $shopping->delete();
        return back()->with("success", __("Datos del articulo eliminados"));
    }
}