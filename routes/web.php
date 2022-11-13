<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DistritoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EtniaController;
use App\Http\Controllers\Profesiones´´Controller;
use App\Http\Controllers\Cargos´´Controller;
use App\Http\Controllers\Sexo´´Controller;
use App\Http\Controllers\Curso´´Controller;
use App\Http\Controllers\Asignacion´´Controller;
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



Route::get('/login', function () {
    return redirect('/admin/login');
});

Route::get('/register', function () {
    return redirect('/admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('distritos', DistritoController::class)->only(['index', 'create', 'store']);
Route::resource('alumnos', AlumnoController::class)->only(['index', 'create', 'store']);
Route::resource('areas', AreaController::class)->only(['index', 'create', 'store']);
Route::resource('etnias', EtniaController::class)->only(['index', 'create', 'store']);
Route::resource('profesiones', Profesiones´´Controller::class)->only(['index', 'create', 'store']);
Route::resource('cargos', Cargos´´Controller::class)->only(['index', 'create', 'store']);
Route::resource('sexs', Sexo´´Controller::class)->only(['index', 'create', 'store']);
Route::resource('cursos', Curso´´Controller::class)->only(['index', 'create', 'store']);
Route::resource('asignaciones', Asignacion´´Controller::class)->only(['index', 'create', 'store']);
Route::get('/export', [App\Http\Controllers\ProductController::class,'export'])->name('products.export');

Route::get('/admin/password/reset', function () {
    return redirect('/password/reset');
})->middleware('guest')->name('password.request');


Route::get('/password', function () {

    return redirect('/password/reset');
});

Route::get('/', function () {

    return redirect('/admin');
});


