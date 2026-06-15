<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chores', [ChoreController::class, 'index'])->name('chores.index');
Route::get('/chores/create', [ChoreController::class, 'store'])->name('chores.create');
Route::post('/chores', [ChoreController::class, 'store'])->name('chores.store');
Route::get('/chores/{id}', [ChoreController::class, 'show'])->name('chores.show');
Route::get('/chores/{id}/edit', [ChoreController::class, 'update'])->name('chores.update');
Route::delete('/chores/{id}', [ChoreController::class, 'delete'])->name('chores.delete');