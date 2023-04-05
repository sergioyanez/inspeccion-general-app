<?php

namespace App\Http\Controllers;

use App\Models\Detalle_inmueble;
use App\Models\Inmueble;
use App\Models\Tipo_inmueble;
use App\Http\Requests\StoreDetalle_inmuebleRequest;
use App\Http\Requests\UpdateDetalle_inmuebleRequest;

/**
 * Controller de DetalleInmueble: brinda acceso a los servicios de los detalles de inmueble.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Detalle_inmueble
 * @version 1.0
 * @since 11/12/2022
 */
class DetalleInmuebleController extends Controller
{
    /**
     * Muestra todos los detalle de un inmueble.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallesInmuebles = Detalle_inmueble::all();
        $inmuebles = Inmueble::all();
        $tiposInmueble = Tipo_inmueble::all();
        return view('detalleInmueble.detallesInmuebles', ['detallesInmuebles' => $detallesInmuebles, 'inmuebles' => $inmuebles, 'tipos' => $tiposInmueble]);
    }

    /**
     * Muestra el formulario para crear un nuevo Tipo de inmueble.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inmuebles = Inmueble::all();
        $tiposInmuebles = Tipo_inmueble::all();
        return view('detalleInmueble.crear', ['inmuebles' => $inmuebles, 'tipos' => $tiposInmuebles]);
    }

    /**
     * Guarda el tipo de inmueble creado en la base de datos
     *
     * @param  \App\Http\Requests\StoreDetalle_inmuebleRequest $request
     */
    // public function store(StoreDetalle_inmuebleRequest $request)
    // {
    //     $detalleInmueble = new Detalle_inmueble();
    //     $detalleInmueble->inmueble_id = $request->inmueble_id;
    //     $detalleInmueble->tipo_inmueble_id = $request->tipo_inmueble_id;
    //     $detalleInmueble->fecha_venc_alquiler = $request->fecha_venc_alquiler;

    //     if ( $detalleInmueble->save()){
    //         $log = new LogsDetalleInmuebleController();
    //         $log->store($detalleInmueble, 'c');
    //         return redirect()->route('detallesInmuebles');
    //     }
    //     return back()->with('fail','No se pudo cargar el detalle de inmueble');
    // }

    public function store($inmueble_id, $tipo_inmueble_id, $fecha_venc_alquiler)
    {
        $detalleInmueble = new Detalle_inmueble();
        $detalleInmueble->inmueble_id = $inmueble_id;
        $detalleInmueble->tipo_inmueble_id = $tipo_inmueble_id;
        $detalleInmueble->fecha_venc_alquiler = $fecha_venc_alquiler;

        if ( $detalleInmueble->save()){
            $log = new LogsDetalleInmuebleController();
            $log->store($detalleInmueble, 'c');
            return $detalleInmueble->id;
        }
        return back()->with('fail','No se pudo cargar el detalle de inmueble');
    }

    /**
     * Muestra un detalle de inmueble específico.
     *
     * @param  int id.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleInmueble = Detalle_inmueble::find($id);
        $inmuebles = Inmueble::all();
        $tiposInmuebles = Tipo_inmueble::all();
        return view('detalleInmueble.mostrar', ['detalleInmueble' => $detalleInmueble, 'inmuebles' => $inmuebles, 'tipos' => $tiposInmuebles]);
    }

    /**
     * Actualiza los datos de un detalle de inmueble.
     * @param  \App\Http\Requests\UpdateDetalle_inmuebleRequest  $request
     */
    public function update(UpdateDetalle_inmuebleRequest $request)
    {
        $detalleInmueble = Detalle_inmueble::find($request->id);
        $detalleInmueble->inmueble_id = $request->inmueble_id;
        $detalleInmueble->tipo_inmueble_id = $request->tipo_inmueble_id;
        $detalleInmueble->fecha_venc_alquiler = $request->fecha_venc_alquiler;

        if ( $detalleInmueble->save()){
            $log = new LogsDetalleInmuebleController();
            $log->store($detalleInmueble, 'u');
            return redirect()->route('detallesInmuebles');
        }
        return back()->with('fail','No se pudo cargar el detalle de inmueble');
    }

    /**
     * Elimina el detalle de inmueble especificado.
     * @param  int $id
     */
    public function destroy($id)
    {
        $detalleInmueble = Detalle_inmueble::find($id);
        if ( $detalleInmueble->delete()){
            $log = new LogsDetalleInmuebleController();
            $log->store($detalleInmueble, 'd');
            return redirect()->route('detallesInmuebles');
        }
        return back()->with('fail','No se pudo eliminar el detalle de inmueble');
    }
}