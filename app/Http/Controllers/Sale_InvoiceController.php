<?php

namespace App\Http\Controllers;

use App\Models\Sale_Invoice;
use Illuminate\Http\Request;

class Sale_InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale_Invoice  $sale_Invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Sale_Invoice $sale_Invoice)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale_Invoice  $sale_Invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale_Invoice $sale_Invoice)
    {
            //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale_Invoice  $sale_Invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale_Invoice $sale_Invoice)
    {
            //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale_Invoice  $sale_Invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale_Invoice $sale_Invoice)
    {
        Sale::destroy($id);


    }
}
