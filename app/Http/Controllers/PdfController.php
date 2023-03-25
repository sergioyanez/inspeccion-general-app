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
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function generarPdf()
    {
        $data = [
            'title' => 'Ejemplo de PDF con Laravel',
            'content' => 'Este es el contenido de mi PDF generado con Laravel.'
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.pdf', $data));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream();
    }



    public function generarExpedientePdf(Request $request){

        $expediente = Expediente::find($request->expediente_id);
        $catastro = DB::table('catastros')
                    ->where('id', '=', $expediente->catastro_id)
                    ->select('catastros.*')
                    ->get();
        $numExpediente = $expediente->nro_expediente;
        $numComercio = $expediente->nro_comercio;
        $actividadPrincipal = $expediente->actividad_ppal;
        $bienes_uso = $expediente->bienes_de_uso;
        $observaciones = $expediente->observaciones_grales;

        $informesDependencias = Informe_dependencias::orderBy('id', 'asc')->where('expediente_id', $expediente->id)->paginate(10);

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


        $detalleInmueble=DB::table('detalles_inmuebles')
                            ->where('id', '=', $expediente->detalle_inmueble_id)
                            ->select('detalles_inmuebles.*')
                            ->get();

        $datosExpediente = [
            'numExpediente' => $numExpediente,
            'numComercio' =>   $numComercio,
            'actividadPrincipal' => $actividadPrincipal,
            'bienes_uso'=> $bienes_uso,
            'observaciones' => $observaciones,
            'tipo_detalle_habilitacion'=>$tipo_detalle_habilitacion,
            'estado_detalle_habilitacion'=>$estado_detalle_habilitacion,
            'fecha_vencimiento_detalle_habilitacion'=>$fecha_vencimiento_detalle_habilitacion,
            'tipo_estado_baja' => $tipo_estado_baja,
            'deuda' =>$deuda,
            'fecha_baja' =>$fecha_baja,
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pdf.pdf', $datosExpediente));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream();
    }
}
