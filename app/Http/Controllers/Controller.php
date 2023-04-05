<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**   
 *  @OA\Info(  
 *  version="1.0.0",
 *  title="Documentación API del Sistema de Gestión de Habilitaciones Municipales de Rauch",
 *  description="Documentado por Héctor Liceaga",
 *  @OA\Contact(  
 *      email="hr.liceaga@gmail.com "  
 *      )
 * ) 
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
