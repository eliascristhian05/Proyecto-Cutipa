<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions=Position::paginate(5);
        return view("positions.index", compact("positions"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position=new Position;
        $title= __("Añadir Cargo");
        $textButton= __("Crear");
        $route=route("positions.store");
        return view("positions.create", compact("title",
        "textButton", "route", "position"
        ));
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
            "description"=>"required|max:90"

        ]);
        Position::create($request->only("description"));
        return redirect(route("positions.index"))
            ->with("success", __("¡Cargo registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $update=true;
        $title= __("Editar Cargo");
        $textButton=__("Actualizar");
        $route=route("positions.update",["position"=>$position]);
        return view("positions.edit", compact("update", "title","textButton","route","position"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $this->validate($request,[
            "description"=>"required"

        ]);
        $position->fill($request->only("description"))->save();
        return redirect(route("positions.index"))->with("success", __("¡Datos actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return back()->with("success", __("¡Dato  Eliminado!"));
    }
}
