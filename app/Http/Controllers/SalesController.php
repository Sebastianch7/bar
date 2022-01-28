<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index',[
            'clients' => DB::table('clients')->where('state','=','1')->get(),
            'sales' => DB::table('sales')
            ->join('storages', 'storages.id','=','sales.idStorage')
            ->select('sales.client','sales.cant','sales.total','storages.name as product')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sales $sales)
    {
        
    }

    public function order($id)
    {
        return view('sales.create',[
            'client' => $id,
            'categories' => DB::table('categories')->get(),
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
        Sales::create([
            'client' => $request->client,
            'idCategory' => $request->idCategory,
            'idStorage' => $request->idStorage,
            'cant' => $request->cant,
            'total' => intval(str_replace(',','',$request->total)),
         ]);
         $data = ['id'=>$request->idStorage, 'cant' => $request->cant];

         return redirect()->route('sales/clean', ['id' => $request->idStorage, 'cant' => $request->cant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
         return view('sales.edit', [
            'client' => $sales->id,
            'sales' => DB::table('sales')
            ->join('storages', 'storages.id','=','sales.idStorage')
            ->where('sales.client','=', $sales->id)
            ->select('sales.client','sales.cant','sales.total','storages.name as product')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
