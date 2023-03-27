<?php

use App\Http\Controllers\TodosController;
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
    return view('welcome');
});

Route::get('/saludos', function () {
    return view('app');
});

Route::get('/tareas', [TodosController::class, 'index'])->name('todos');

Route::patch('/tareas', [TodosController::class, 'index'])->name('todos-edit');
Route::delete('/tareas', [TodosController::class, 'index'])->name('todos-destroy');


Route::post('/tareas', [TodosController::class, 'store'])->name('todos');
