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

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('auth')->name('index');

Route::get('/add',[App\Http\Controllers\Admin\AddController::class, 'index'])->middleware(['auth','isSup'])->name('add');
Route::post('/add',[App\Http\Controllers\Admin\AddController::class, 'store'])->middleware(['auth','isSup'])->name('store');

Route::post('/update',[App\Http\Controllers\Admin\UpdateController::class, 'update'])->middleware(['auth','isSup'])->name('update');
Route::post('/selete',[App\Http\Controllers\Admin\DeleteController::class, 'delete'])->middleware(['auth','isSup'])->name('delete');

Route::get('/log', [App\Http\Controllers\Admin\LogController::class, 'index'])->middleware(['auth','isAdmin'])->name('log');

Route::get('/change', [App\Http\Controllers\Admin\ChangeController::class, 'index'])->middleware(['auth','isSup']);
Route::post('/change', [App\Http\Controllers\Admin\ChangeController::class, 'changePassword'])->middleware(['auth','isSup']);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
