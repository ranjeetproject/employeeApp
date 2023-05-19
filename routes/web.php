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

Route::get('/', [App\Http\Controllers\EmployeeController::class, 'index'])->name("employee.index");
Route::get('/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name("employee.create");
Route::post('/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
Route::get('/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name("employee.edit");
Route::post('/update/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name("employee.update");
Route::get('/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name("employee.delete");





// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/show', [App\Http\Controllers\EmployeeController::class, 'index']);