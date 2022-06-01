<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use app\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EscuelaController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::resource('departamentos', 'App\Http\Controllers\DepartamentoController') /* debo usar la ruta completa */
  ->middleware(['auth:sanctum', 'verified']);

Route::resource('escuelas', 'App\Http\Controllers\EscuelaController') /* debo usar la ruta completa */
  ->middleware(['auth:sanctum', 'verified']);


