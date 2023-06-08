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
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/dashboard', [TodosController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/todos/mine', [TodosController::class, 'byUserId'])->middleware(['auth'])->name('mine');
Route::get('/todos/{id}/edit', [TodosController::class, 'edit'])->middleware(['auth'])->name('edit-form');
Route::get('/todos/create', [TodosController::class, 'create'])->middleware(['auth'])->name('create-form');
Route::post('/todos/{id}/update', [TodosController::class, 'update'])->middleware(['auth'])->name('update');
Route::post('/todos/add', [TodosController::class, 'store'])->middleware(['auth'])->name('add');
Route::get('/todos/{id}', [TodosController::class, 'show'])->middleware(['auth'])->name('show');
Route::delete('/todos/:id', [TodosController::class, 'delete'])->middleware(['auth'])->name('delete');




Route::get('/', function () {
    return view('welcome');
});

//

require __DIR__.'/auth.php';
