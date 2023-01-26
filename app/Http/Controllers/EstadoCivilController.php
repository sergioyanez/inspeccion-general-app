<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado_civil;
use App\Http\Requests\StoreEstado_civilRequest;
use App\Http\Requests\UpdateEstado_civilRequest;

class EstadoCivilController extends Controller
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
    public function create(Request $request)
    {
        $request->validate( [
            'descripcion' => 'required' | 'string' | 'max:25',
        ]);

        $estado_civil = new Estado_civil();
        $estado_civil->descripcion = $request->descripcion;

        if ($estado_civil->save()){
            return back()->with('success','Estado civil se creó correctamente');
        }
        return back()->with('fail','No se pudo cargar el estado civil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstado_civilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstado_civilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function show(Estado_civil $estado_civil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado_civil $estado_civil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstado_civilRequest  $request
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstado_civilRequest $request, Estado_civil $estado_civil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado_civil  $estado_civil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado_civil $estado_civil)
    {
        //
    }
}
