<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [TodoController::class, 'index'])->name('menu'); //get isteğim

Route::get('/todo-ekle', function() { return view('todo.todo-ekle'); }); //get isteğim

Route::post('todo-ekle', [TodoController::class, 'ekle'])->name('ekle'); //post isteğim

Route::put('todo-guncelle/{todoID}', [TodoController::class, 'guncelle'])->name('guncelle'); //put isteğim

Route::put('todo-sil/{todoID}', [TodoController::class, 'sil'])->name('sil'); //put isteğim

Route::get('/home', [HomeController::class, 'index'])->name('home'); //get isteğim

