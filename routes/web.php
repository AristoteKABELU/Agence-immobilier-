<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/biens')->name('biens.')->controller(BienController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store');
    Route::get('/{bien}-{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/edit', 'update');
    Route::delete('/{id}/destroy', 'destroy');

});

Route::prefix('/admin')->name('auth.')->controller(AuthController::class)->group(function (){
    Route::get('/', 'login')->name('login');
    Route::delete('/', 'logout')->name('logout');
});
