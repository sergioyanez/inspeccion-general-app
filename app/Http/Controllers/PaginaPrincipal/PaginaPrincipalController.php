<?php

namespace App\Http\Controllers\PaginaPrincipal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaginaPrincipalController extends Controller
{
    public function index(){
        return view('paginaPrincipal.paginaPrincipal');
    }
}
