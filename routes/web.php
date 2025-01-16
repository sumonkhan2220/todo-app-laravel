<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/
/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/', [TodoController::class, 'index'])->name('index');

Route::get('/alltodo', [TodoController::class, 'alltodo'])->name('alltodo');

Route::get('/addtodo', [TodoController::class, 'addtodo'])->name('addtodo');

Route::post('insert', [TodoController::class, 'insert'])->name('insert');

Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');

Route::put('/update/{id}',[TodoController::class, 'update'])->name('update');