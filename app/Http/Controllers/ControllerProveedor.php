<?php

namespace App\Http\Controllers;

use App\Http\Requests\Proveedor\storeRequest;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class ControllerProveedor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('dashboard.proveedor',compact('proveedores'));
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
        $request->validate([
                'nombre_proveedor'=>'required|min:5|max:100',
                'direccion_proveedor' => 'required|min:10|max:255',
            ]);

        Proveedor::create([
            'nombre_proveedor' => $request->nombre_proveedor,
            'direccion_proveedor' => $request->direccion_proveedor,
        ]);

        return redirect()->back()->with('success','Proveedor agregado Correctamente');
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->back()->with('success','Proveedor eliminado Correctamente');
    }

}
