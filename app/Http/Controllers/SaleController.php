<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Employee;
use App\Models\Client;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sale::with("employee","client")->paginate(15);
        return view("sales.index", compact("sales"),[
            "employees"=>Employee::get(),
            "clients"=>Client::get()
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $employees=Employee::get();
        $clients=Client::get();
        $sale=new Sale;
        $title= __("Añadir Sale");
        $textButton=__("Crear");
        $route=route("sales.store");
        return view("sales.create", compact("title", "textButton", "route","sale","employees","clients"));
    
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
            "id_employee"=>"required",
            "id_client"=>"required",
            "quantity"=>"required",
            "date"=>"required"
        ]);
        Sale::create($request->only("id_employee","id_client","quantity","date"));
        return redirect(route("sales.index"))
            ->with("success", __("Sale registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $update=true;
        $title= __("Editar datos de la Venta");
        $employees=Employee::get();
        $clients=Client::get();
        $textButton= __("Actualizar");
        $route=route("sales.update",["sale"=>$sale]);
        return view("sales.edit", compact("update","title","employees","clients","sale","textButton","route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $this->validate($request,[
            "quantity"=>"required",
            "id_employee"=>"required",
            "id_client"=>"required",
            "date"=>"required",
        ]);
        $sale->fill($request->only("quantity","id_employee","id_client","date"))->save();
        return redirect(route("sales.index"))->with("success", __("Datos actualizados"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return back()->with("success", __("Datos de la venta eliminados"));
    }
}
