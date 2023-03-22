<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
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
}
