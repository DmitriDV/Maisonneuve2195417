<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
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
    $user_name ='';
    $user_id ='';

    if(Auth::check()){
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
    }
    return view('welcome', ['user_id'=>$user_id, 'user_name'=>$user_name]);
})->name('welcome');

Route::get('/about', function () {
    $user_name ='';
    $user_id ='';

    if(Auth::check()){
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
    }
    return view('about', ['user_id'=>$user_id, 'user_name'=>$user_name]);
})->name('about');

Route::get('/liste', [UserController::class, 'index'])->name('liste');
//Route::get('/liste/create/user', [UserController::class, 'create'])->name('liste.create');
//Route::post('/liste/create/user', [UserController::class, 'store'])->name('liste.create');
Route::get('/liste/{user}', [UserController::class, 'show'])->name('liste.show');
Route::get('/liste/{user}/edit', [UserController::class, 'edit'])->name('liste.edit')->middleware('auth');
Route::put('/liste/{user}/edit', [UserController::class, 'update']);
Route::delete('/liste/{user}', [UserController::class, 'destroy']);

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('custom.registration');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('custom-login', [CustomAuthController::class, 'dashboard']);

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