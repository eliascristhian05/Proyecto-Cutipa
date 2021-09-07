<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::with("position")->paginate(15);
        return view("employees.index", compact("employees"),[
            "positions"=>Position::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions=Position::get();
        $employee=new Employee;
        $title= __("Añadir Personal");
        $textButton=__("Crear");
        $route=route("employees.store");
        return view("employees.create", compact("title", "textButton", "route","employee","positions"));
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
            "name"=>"required|max:90",
            "surname"=>"required",
            "id_position"=>"required",
            "direction"=>"required",
            "CI"=>"required",
            "password"=>"required",
            "phone"=>"required",
            "salary"=>"required",
            "schedule"=>"required"
        ]);
        Employee::create($request->only("name","surname","id_position","direction","CI","password","phone","salary","schedule"));
        return redirect(route("employees.index"))
            ->with("success", __("Personal registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $update=true;
        $title= __("Editar datos del Personal");
        $positions=Position::get();
        $textButton= __("Actualizar");
        $route=route("employees.update",["employee"=>$employee]);
        return view("employees.edit", compact("update","title","positions","employee","textButton","route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            "name"=>"required|max:90",
            "surname"=>"required",
            "id_position"=>"required",
            "direction"=>"required",
            "CI"=>"required",
            "password"=>"required",
            "phone"=>"required",
            "salary"=>"required",
            "schedule"=>"required"
        ]);
        $employee->fill($request->only("name","surname","id_position","direction","CI","password","phone","salary","schedule"))->save();
        return redirect(route("employees.index"))->with("success", __("Datos actualizados"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with("success", __("Datos del articulo eliminados"));
        
    }
}
