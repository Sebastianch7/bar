<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Redirect,Response;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('storage.index',[
            'storages' => DB::table('storages')
            ->join('categories', 'storages.idCategory','=','categories.id')
            ->select('categories.name as category','storages.*')
            ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('storage.create',[
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
        Storage::create([
            'name' => $request->name,
            'idCategory' => $request->idCategory,
            'price' => $request->price,
            'total' => $request->total
          ]);
          return redirect('/storage')->with('status','El servicio '.$request->name.' ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function show(Storage $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function edit(Storage $storage)
    {
        //$storages = Storage::find($storage);
        //$storages
         return view('storage.edit', [
            'storage' => $storage,
            'categories' => DB::table('categories')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Storage $storage)
    {
        $storage->update($request->all());
        return redirect('/storage')->with('status','el producto ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Storage $storage)
    {
        //
    }

    public function byCategory($id){
        return Storage::where('idCategory','=',$id)->get();
    }

    public function clean(){
        $id= $_GET['id'];
        $cant = $_GET['cant'];
        
        $storages = Storage::find($id);
        $storages->total = $storages->total-$cant;
        $storages->save();

        return redirect('/sales');
    }


}
