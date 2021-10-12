<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

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
/*
Route::get('/personas', 'App\Http\Controllers\PersonaController@index')->name('index');
Route::get('/personas/create', 'App\Http\Controllers\PersonaController@create')->name('create');
Route::post('/personas/create', 'App\Http\Controllers\PersonaController@store')->name('store');
Route::get('/personas/{persona}', 'App\Http\Controllers\PersonaController@show')->name('show');
Route::get('/personas/edit', 'App\Http\Controllers\PersonaController@edit')->name('edit');
Route::get('/personas/update', 'App\Http\Controllers\PersonaController@update')->name('update');
Route::get('/personas/destroy', 'App\Http\Controllers\PersonaController@destroy')->name('destroy');
*/

/*Route::get('/personas', 'App\Http\Controllers\PersonaController@index')->name('index')->middleware('auth');
Route::post('/personas', 'App\Http\Controllers\PersonaController@store')->name('store')->middleware('auth');
Route::get('/personas/create', 'App\Http\Controllers\PersonaController@create')->name('create')->middleware('auth');
Route::delete('/personas/{persona}', 'App\Http\Controllers\PersonaController@destroy')->name('destroy')->middleware('auth');
Route::PATCH('/personas/{persona}', 'App\Http\Controllers\PersonaController@update')->name('update')->middleware('auth');
Route::get('/personas/{persona}', 'App\Http\Controllers\PersonaController@show')->name('show')->middleware('auth');
Route::get('/personas/{persona}/edit', 'App\Http\Controllers\PersonaController@edit')->name('edit')->middleware('auth');
*/

//Route::get('/personas', [PersonaController::class, 'index']);
Route::resource('personas', PersonaController::class)->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
