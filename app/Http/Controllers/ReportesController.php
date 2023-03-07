<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expediente;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function proximasVencer()
    {
        $reportes = $this->reportesPorVencer(15);
        return view('reportes/tablaReportes', ['reportes'=>$reportes,'vencido'=>'Activo','plazo'=>'proximas a vencer en 15 dias']);
    }

    public function vencidas()
    {
        $reportes = $this->vencencidos(0);
        return view('reportes/tablaReportes', ['reportes'=>$reportes,'vencido'=>'Vencido','plazo'=>'vencidas']);
    }

    private function reportesPorVencer($plazo){
        return Expediente::with('detalleHabilitacion','contribuyentes')
        ->whereHas('detalleHabilitacion', function ($query) use ($plazo) {
            $query->whereDate('fecha_vencimiento', '>=', Carbon::now())
                ->whereDate('fecha_vencimiento', '<=', Carbon::now()->addDays($plazo));
        })
        ->get();
    }


    private function vencencidos($plazo){
        return Expediente::with('detalleHabilitacion','contribuyentes')
        ->whereHas('detalleHabilitacion', function ($query) use ($plazo) {
            $query->whereDate('fecha_vencimiento', '<=', Carbon::now()->addDays($plazo));
        })
        ->get();
    }
}
