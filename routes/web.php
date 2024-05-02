<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/adduser', [UserController::class, 'create'])->name('users.create');
Route::post('/adduser', [UserController::class, 'add'])->name('users.add');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/edit/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');


