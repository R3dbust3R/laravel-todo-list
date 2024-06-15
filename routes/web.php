<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [TaskController::class, 'index'])->name('task.index');

Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/update/{task}', [TaskController::class, 'update'])->name('task.update');

Route::get('/destroy/{task}', [TaskController::class, 'destroy'])->name('task.destroy');

Route::get('/done/{task}', [TaskController::class, 'done'])->name('task.done');

Route::get('/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/store', [TaskController::class, 'store'])->name('task.store');

