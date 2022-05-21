<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EtudiantController;
use \App\Http\Controllers\VilleController;
use \App\Http\Controllers\ArticleController;
use \App\Http\Controllers\LocalizationController;

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
    return view('welcome')->name('welcome');
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

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('custom.registration');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);

Route::get('/forum', [ArticleController::class, 'index'])->name('forum')->middleware('auth');
Route::get('/forum/{article}', [ArticleController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('/forum/create/article', [ArticleController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('/forum/create/article', [ArticleController::class, 'store'])->name('forum.store')->middleware('auth');
Route::get('forum/{article}/edit', [ArticleController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('forum/{article}/edit', [ArticleController::class, 'update'])->middleware('auth');
Route::delete('forum/{article}', [ArticleController::class, 'destroy'])->middleware('auth');
Route::get('forum-queries', [ArticleController::class, 'queries'])->middleware('auth');
Route::get('forum/{article}/PDF', [ArticleController::class, 'showPdf'])->name('forum.pdf')->middleware('auth');

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');