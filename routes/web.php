<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    InvitacionesController
};

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

//Busqueda de invitaciones
Route::get('/buscar-invitacion', [InvitacionesController::class, 'buscar_invitacion'])->name('invitados.buscar');
Route::get('/invitacion/{codigo}', [InvitacionesController::class, 'invitacion'])->name('invitados.invitacion');

Auth::routes();
//Ruta de pagina principal
Route::get('/home', [HomeController::class, 'home'])->name('home');
