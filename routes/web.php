<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Vue
Route::get('vue/get-words', [App\Http\Controllers\WordsController::class, 'getWords']);
Route::post('vue/save-result', [App\Http\Controllers\WordsController::class, 'saveResult']);
Route::get('vue/create-record', [App\Http\Controllers\WordsController::class, 'createRecord']);
