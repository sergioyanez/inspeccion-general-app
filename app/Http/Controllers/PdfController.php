<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Expediente;
use App\Models\Detalle_inmueble;
use App\Models\Detalle_habilitacion;
use App\Models\Catastro;
use App\Models\Estado_baja;
use App\Models\Informe_dependencias;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    // public function generarPdf()
    // {
    //     $data = [
    //         'title' => 'Ejemplo de PDF con Laravel',
    //         'content' => 'Este es el contenido de mi PDF generado con Laravel.'
    //     ];

    //     $pdf = new Dompdf();
    //     $pdf->loadHtml(View::make('pdf.pdf', $data));
    //     $pdf->setPaper('A4', 'portrait');
    //     $pdf->render();
    //     return $pdf->stream();
    // }



    public function generarExpedientePdf(Request $request){

        $expediente = Expediente::find($request->expediente_id);
        $contribuyentes = DB::table('expediente_contribuyente')
                            ->join('expedientes','expediente_contribuyente.expediente_id', '=', 'expedientes.id')
                            ->join('contribuyentes','expediente_contribuyente.contribuyente_id', '=', 'contribuyentes.id')
                            ->where('expediente_contribuyente.expediente_id', '=', $request->expediente_id)
                            ->select('contribuyentes.*')
                            ->get();
        $personasJuridicas = DB::table('expedientes_personas_juridicas')
                            ->join('expedientes','expedientes_personas_juridicas.expediente_id', '=', 'expedientes.id')
                            ->join('personas_juridicas','expedientes_personas_juridicas.persona_juridica_id', '=', 'personas_juridicas.id')
                            ->where('expedientes_personas_juridicas.expediente_id', '=', $request->expediente_id)
                            ->select('personas_juridicas.*')
                            ->get();
        $numExpediente = $expediente->nro_expediente;
        $numComercio = $expediente->nro_comercio;
        $actividadPrincipal = $expediente->actividad_ppal;
        $bienes_uso = $expediente->bienes_de_uso;
        $observaciones = $expediente->observaciones_grales;

        $informesDependencias =  DB::table('informes_dependencias')
                                    ->join('expedientes','informes_dependencias.expediente_id', '=', 'expedientes.id')
                                    ->join('tipos_dependencias','informes_dependencias.tipo_dependencia_id', '=', 'tipos_dependencias.id')
                                    ->where('expedientes.id', '=', $request->expediente_id)
                                    ->select('informes_dependencias.fecha_informe','informes_dependencias.observaciones','tipos_dependencias.nombre','tipos_dependencias.id')
                                    ->get();

        $catastro = DB::table('catastros')
                        ->where('id', '=', $expediente->catastro_id)
                        ->select('catastros.*')
                        ->get();
        if($expediente->estado_baja_id){
            $tipo_estado_baja = DB::table('tipos_bajas')
                                ->join('estados_bajas','estados_bajas.tipo_baja_id', '=', 'tipos_bajas.id')
                                ->where('id', '=', $expediente->estado_baja_id)
                                ->select('tipos_bajas.descripcion')
                                ->get();
            $deuda = DB::table('estados_bajas')
                        ->where('id', '=', $expediente->estado_baja_id)
                        ->select('estados_bajas.deuda')
                        ->get();
            $fecha_baja = DB::table('estados_bajas')
                            ->where('id', '=', $expediente->estado_baja_id)
                            ->select('estados_bajas.fecha_baja')
                            ->get();
        }else{
            $tipo_estado_baja ="";
            $deuda ="";
            $fecha_baja ="";
        }
        $tipo_detalle_habilitacion = DB::table('tipos_habilitaciones')
                                        ->join('detalles_habilitaciones','detalles_habilitaciones.tipo_habilitacion_id', '=', 'tipos_habilitaciones.id')
                                        ->where('detalles_habilitaciones.id', '=', $expediente->detalle_habilitacion_id)
                                        ->select('tipos_habilitaciones.descripcion')
                                        ->get();
        $estado_detalle_habilitacion = DB::table('tipos_estados')
                                        ->join('detalles_habilitaciones','detalles_habilitaciones.tipo_estado_id', '=', 'tipos_estados.id')
                                        ->where('detalles_habilitaciones.id', '=', $expediente->detalle_habilitacion_id)
                                        ->select('descripcion')
                                        ->get();
        $fecha_vencimiento_detalle_habilitacion= DB::table('detalles_habilitaciones')
                                        ->where('id', '=', $expediente->detalle_habilitacion_id)
                                        ->select('detalles_habilitaciones.fecha_vencimiento')
                                        ->get();
        $fecha_primer_habilitacion= DB::table('detalles_habilitaciones')
                                        ->where('id', '=', $expediente->detalle_habilitacion_id)
                                        ->select('detalles_habilitaciones.fecha_primer_habilitacion')
                                        ->get();
        $domicilio=DB::table('detalles_inmuebles')
                    ->join('expedientes','expedientes.detalle_inmueble_id', '=', 'detalles_inmuebles.id')
                    ->join('inmuebles','detalles_inmuebles.inmueble_id', '=', 'inmuebles.id')
                    ->where('expedientes.id', '=', $request->expediente_id)
                    ->select('inmuebles.*')
                    ->get();
        $tipoInmueble=DB::table('detalles_inmuebles')
                    ->join('expedientes','expedientes.detalle_inmueble_id', '=', 'detalles_inmuebles.id')
                    ->join('tipos_inmuebles','detalles_inmuebles.tipo_inmueble_id', '=', 'tipos_inmuebles.id')
                    ->where('expedientes.id', '=', $request->expediente_id)
                    ->select('tipos_inmuebles.descripcion')
                    ->get();
        $datosExpediente = [
            'contribuyentes'=>$contribuyentes,
            'personasJuridicas' => $personasJuridicas,
            'numExpediente' => $numExpediente,
            'numComercio' =>   $numComercio,
            'actividadPrincipal' => $actividadPrincipal,
            'domicilio' => $domicilio,
            'tipoInmueble' => $tipoInmueble,
            'bienes_uso'=> $bienes_uso,
            'observaciones' => $observaciones,
            'informesDependencias' => $informesDependencias,
            'catastro' => $catastro,
            'tipo_detalle_habilitacion'=>$tipo_detalle_habilitacion,
            'estado_detalle_habilitacion'=>$estado_detalle_habilitacion,
            'fecha_vencimiento_detalle_habilitacion'=>$fecha_vencimiento_detalle_habilitacion,
            'fecha_primer_habilitacion' => $fecha_primer_habilitacion,
            'tipo_estado_baja' => $tipo_estado_baja,
            'deuda' =>$deuda,
            'fecha_baja' =>$fecha_baja,
        ];
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.pdfExpediente', $datosExpediente));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream();
    }

    public function generarReporteHabilitacionesAvencerPdf(Request $request){
        $request->validate([
            'desde' => 'required|date',
            'hasta' => 'required|date',
        ]);

        $data = [
                     'reportes' => $this->reportesPorVencer($request->desde,$request->hasta),
                     'vencido'=>'Activo',
                     'plazo'=>'proximas a vencer entre: '.$request->desde.' y '.$request->hasta,
                     'desde'=>$request->desde,
                     'hasta'=>$request->hasta

                 ];


        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.pdfReportesHabilitacionesAvencer', $data));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream();
    }


    public function generarReporteHabilitacionesVencidasPdf(Request $request){

        $data = [
                     'reportes' => $this->vencidos(0),
                     'vencido'=>'Vencido',
                     'plazo'=>'vencidas'

                 ];
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.pdfReportesHabilitacionesVencidas', $data));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream();
    }


    private function vencidos($plazo){
        return Expediente::with(['detalleHabilitacion', 'contribuyentes', 'avisos' => function ($query) {
            $query->orderBy('fecha_aviso', 'asc'); //Obtener solo el aviso más reciente
        }])
            ->whereHas('detalleHabilitacion', function ($query) use ($plazo) {
                $query->whereDate('fecha_vencimiento', '<=', Carbon::now()->addDays($plazo));
            })
            ->whereNull('estado_baja_id')
            ->get();
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
}
