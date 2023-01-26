<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoDniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('getDni', [TipoDniController::class, 'show'])->name('home');
Route::post('newDni', [TipoDniController::class, 'create']);
Route::get('delete/{id}', [TipoDniController::class, 'destroy'])->name('delete');