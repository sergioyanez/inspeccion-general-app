<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expediente;
use Carbon\Carbon;

/**
 * Controller de Reportes: brinda acceso a los servicios de los reportes.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see Expediente
 * @see Carbon - Dependencia de gestión de fechas
 * @version 1.0
 * @since 11/12/2022
 */
class ReportesController extends Controller
{
    public function proximasVencer(Request $request)
    {
        $request->validate([
            'desde' => 'required|date',
            'hasta' => 'required|date',
        ]);
        $reportes = $this->reportesPorVencer($request->desde,$request->hasta);
        return view('reportes.tablaReportes', ['reportes'=>$reportes,'vencido'=>'Activo','plazo'=>'proximas a vencer entre: '.$request->desde.' y '.$request->hasta,'desde'=>$request->desde,'hasta'=>$request->hasta]);
    }

    public function vencidas()
    {
        $reportes = $this->vencencidos(0);
        return view('reportes.tablaReportes', ['reportes'=>$reportes,'vencido'=>'Vencido','plazo'=>'vencidas']);
    }

    private function reportesPorVencer($desde,$hasta){
        return Expediente::with(['detalleHabilitacion', 'contribuyentes', 'avisos' => function ($query) {
            $query->orderBy('fecha_aviso', 'asc'); //Obtener solo el aviso más reciente
        }])
            ->whereHas('detalleHabilitacion', function ($query) use ($desde, $hasta) {
                $query->whereDate('fecha_vencimiento', '>=', $desde)
                    ->whereDate('fecha_vencimiento', '<=', $hasta);
            })
            ->whereNull('estado_baja_id')
            ->get();
    }


    private function vencencidos($plazo){
        return Expediente::with(['detalleHabilitacion', 'contribuyentes', 'avisos' => function ($query) {
            $query->orderBy('fecha_aviso', 'asc'); //Obtener solo el aviso más reciente
        }])
            ->whereHas('detalleHabilitacion', function ($query) use ($plazo) {
                $query->whereDate('fecha_vencimiento', '<=', Carbon::now()->addDays($plazo));
            })
            ->whereNull('estado_baja_id')
            ->get();
    }
}