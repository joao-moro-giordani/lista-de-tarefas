<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chores', [ChoreController::class, 'index'])->name('chores.index');
Route::get('/chores/create', [ChoreController::class, 'create'])->name('chores.create');
Route::post('/chores', [ChoreController::class, 'store'])->name('chores.store');
Route::get('/chores/{id}', [ChoreController::class, 'show'])->name('chores.show');
Route::get('/chores/{id}/edit', [ChoreController::class, 'edit'])->name('chores.edit');
Route::put('/chores/{id}', [ChoreController::class, 'update'])->name('chores.update');
// confirmation page (GET) for deleting a chore
Route::get('/chores/{id}/delete', [ChoreController::class, 'confirmDelete'])->name('chores.delete');
// actual deletion (DELETE)
Route::delete('/chores/{id}', [ChoreController::class, 'delete'])->name('chores.destroy');