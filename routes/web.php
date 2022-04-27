<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EtudiantController;
use \App\Http\Controllers\VilleController;

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

Route::get('/about', function () {
    return view('about');
});

Route::get('/liste', [EtudiantController::class, 'index'])->name('liste');
Route::get('/liste/create/etudiant', [EtudiantController::class, 'create'])->name('liste.create');
Route::post('/liste/create/etudiant', [EtudiantController::class, 'store'])->name('liste.create');
Route::get('/liste/{etudiant}', [EtudiantController::class, 'show'])->name('liste.show');
Route::get('/liste/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('liste.edit');
Route::put('/liste/{etudiant}/edit', [EtudiantController::class, 'update']);
Route::delete('/liste/{etudiant}', [EtudiantController::class, 'destroy']);
