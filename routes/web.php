<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

// Route::get('/tareas', function () {
//     return view('todos.index');
// })->name('todos');
//Tambien podemos nos regresar rutas si no textos , return 'Hola a todos desde esta ruta'

// Route::get('/tareas', 'TodosController@index');

Route::get('/tareas',[TodosController::class, 'index'])->name('todos');

Route::post('/tareas',[TodosController::class, 'store'])->name('todos');


Route::get('/tareas/{id}',[TodosController::class, 'show'])->name('todos-edit');
Route::patch('/tareas/{id}',[TodosController::class, 'update'])->name('todos-update');
Route::delete('/tareas/{id}',[TodosController::class, 'destroy'])->name('todos-destroy');