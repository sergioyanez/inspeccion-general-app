<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AvisoModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AvisosStore;
use App\Http\Controllers\LogsAvisosController;
use App\Models\Expediente;
use Carbon\Carbon;

/**
 * Controller de Avisos: brinda acceso a los servicios de los avisos.
 *
 * @author  Sebastián Esains: sebaesains77@gmail.com
 *          Alexis Galván: alexisleogalvan12@gmail.com
 *          Elva Kheler: mekdy.20@gmail.com
 *          Héctor Liceaga: lice2187@gmail.com
 *          Eugenio Miller: eugeniomiller93@gmail.com
 *          Sergio Yañez: sergiomyanez01@gmail.com
 * @see AvisoModel
 * @see Contribuyente
 * @version 1.0
 * @since 11/12/2022
 */
class AvisosController extends Controller
{
    /**
    * @OA\Get(
    * path="/avisos/{id}/{desde}/{hasta}",
    * summary="Lista de avisos delimitados por fechas.",
    * description="Devuelve un listado de los avisos desde la fecha ingresada 'desde', hasta la fecha 'hasta'",
    * operationId="avisosGet",
    * tags={"avisos"},
    * @OA\Parameter(
    *    description="ID del aviso",
    *    in="path",
    *    name="id",
    *    required=true,
    *    example="1",
    * ),
    * @OA\Parameter(
    *    description="fecha desde la cual se filtran los avisos",
    *    in="path",
    *    name="desde",
    *    required=true,
    * ),
    * @OA\Parameter(
    *    description="fecha hasta la cual se filtran los avisos",
    *    in="path",
    *    name="hasta",
    *    required=true,
    * ),
    * @OA\Response(
    *    response=200,
    *    description="Lista de avisos",       
    *    @OA\JsonContent(
    *      @OA\Property(property="data"), type="object",
    *      )
    *  )
    * )
    */
    public function index($id,$desde = 0,$hasta = 0)
    {
        $expediente = Expediente::find($id);
        $avisos = AvisoModel::join('expedientes', 'aviso.expediente_id', '=', 'expedientes.id')
        ->join('detalles_habilitaciones', 'expedientes.detalle_habilitacion_id', '=', 'detalles_habilitaciones.id')
        ->join('users', 'aviso.avisado_por', '=', 'users.id')
        ->select('aviso.*', 'detalles_habilitaciones.fecha_vencimiento','users.usuario')
        ->where('expedientes.id', '=', $id)
        ->orderBy('aviso.fecha_aviso', 'desc')
        ->get();
        if($desde !=0 && $hasta !=0){
            return view('avisos.avisos', [
                'avisos'=> $avisos,
                'expediente'=>$expediente,
                'desde' => $desde,
                'hasta' => $hasta,
                'fecha_actual'=>Carbon::now()->format('Y-m-d')
            ]);
        }else{
            return view('avisos.avisos', [
                'avisos'=> $avisos,
                'expediente'=>$expediente,
                'fecha_actual'=>Carbon::now()->format('Y-m-d')
            ]);
        }
    }

    /**
    * @OA\Post(
    * path="/avisos/guardar",
    * summary="Almacena un aviso.",
    * description="Guarda un aviso.",
    * operationId="avisoPost",
    * tags={"avisos"},
    * @OA\RequestBody(
    *    required=true,
    *    description="Nuevo aviso",
    *    @OA\JsonContent(
    *       required={"fecha_aviso","detalle","expediente_id","tipo_comunicacion"},
    *       @OA\Property(property="fecha_aviso", type="date", format="YYYY-MM-DD", example="2023-12-25"),
    *       @OA\Property(property="detalle", type="string", example="Detalle de aviso"),
    *       @OA\Property(property="expediente_id", type="integer", example="1"),
    *       @OA\Property(property="tipo_comunicacion", type="integer", example="1"),
    *       @OA\Property(property="file", type="string", format="binary"),
    *    ),
    * ),
    * @OA\Response(
    *    response=200,
    *    description="Guardado con éxito.",       
    *    @OA\JsonContent(
    *      @OA\Property(property="message"), type="string", example="Guardado con éxito."
    *      )
    *  )
    * )
    */
    public function store(AvisosStore $request)
    {
        if ($request->hasFile('pdf_file')) {
            $pdf_file = $request->file('pdf_file');
            $pdf_file_name = time() . '_' . $pdf_file->getClientOriginalName();
            $pdf_file->move(public_path().'/archivos/avisos/'.$request->input('nro_expediente').'/', $pdf_file_name);
            $pdf_file_name = '/archivos/avisos/'.$request->input('nro_expediente').'/'.$pdf_file_name;
        }else{
            $pdf_file_name = '';
        }

        $aviso = new AvisoModel;
        $aviso->fecha_aviso = $request->input('fecha_aviso');
        $aviso->detalle = $request->input('detalle');
        $aviso->avisado_por = Auth::user()->id;
        $aviso->expediente_id = $request->input('expediente_id');
        $aviso->archivo_pdf = $pdf_file_name;
        $aviso->tipo_comunicacion = $request->input('tipo_comunicacion');
        if($aviso->save()){
            $log = new LogsAvisosController();
            $log->store($aviso, 'c');
            if($request->input('desde') && $request->input('hasta')){
                return redirect()->route('avisos',['id'=>$aviso->expediente_id,'desde'=>$request->input('desde'),'hasta'=>$request->input('hasta')])->with('success','Creado con éxito');
            }
            return redirect()->route('avisos_1',$aviso->expediente_id)->with('success','Creado con éxito');
        }
        return back()->with('fail','No se pudo crear el aviso');
    }
}
