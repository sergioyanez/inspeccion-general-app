<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expediente;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

    public function enTramite()
    {
        $reportes = $this->habilitacionesEnTramite();
        return view('reportes.tablaReportes', ['reportes'=>$reportes,'vencido'=>'en Tramite','plazo'=>'en Tramite','tramite'=>'tramite']);
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

    private function habilitacionesEnTramite(){
        return Expediente::with(['detalleHabilitacion', 'contribuyentes', 'avisos' => function ($query) {
            $query->orderBy('fecha_aviso', 'asc'); //Obtener solo el aviso más reciente
        }])
            ->whereHas('detalleHabilitacion', function ($query) {
                $query->where('tipo_estado_id', '=', 1);
            })
            ->whereNull('estado_baja_id')
            ->get();
    }
}
