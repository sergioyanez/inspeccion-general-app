<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expediente;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function proximasVencer(Request $request)
    {
        $request->validate([
            'desde' => 'required|date',
            'hasta' => 'required|date',
        ]);
        $reportes = $this->reportesPorVencer($request->desde,$request->hasta);
        return view('reportes/tablaReportes', ['reportes'=>$reportes,'vencido'=>'Activo','plazo'=>'proximas a vencer entre: '.$request->desde.' y '.$request->hasta]);
    }

    public function vencidas()
    {
        $reportes = $this->vencencidos(0);
        return view('reportes/tablaReportes', ['reportes'=>$reportes,'vencido'=>'Vencido','plazo'=>'vencidas']);
    }

    private function reportesPorVencer($desde,$hasta){
        return Expediente::with('detalleHabilitacion','contribuyentes','avisos')
        ->whereHas('detalleHabilitacion', function ($query) use ($desde,$hasta) {
            $query->whereDate('fecha_vencimiento', '>=', $desde)
                ->whereDate('fecha_vencimiento', '<=', $hasta);
        })
        ->whereDoesntHave('estadoBaja', function ($query) {
            $query->where('tipo_baja_id', 2);
        })
        ->get();
    }


    private function vencencidos($plazo){
        return Expediente::with('detalleHabilitacion','contribuyentes','avisos','estadoBaja')
        ->whereHas('detalleHabilitacion', function ($query) use ($plazo) {
            $query->whereDate('fecha_vencimiento', '<=', Carbon::now()->addDays($plazo));
        })
        ->whereDoesntHave('estadoBaja', function ($query) {
            $query->where('tipo_baja_id', 2);
        })
        ->get();
    }
}
