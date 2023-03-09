<?php

namespace App\Http\Controllers\PaginaPrincipal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaginaPrincipalController extends Controller
{
    public function index(){
        return view('paginaPrincipal.paginaPrincipal',['fecha_actual'=>Carbon::now()->format('Y-m-d')]);
    }
}
