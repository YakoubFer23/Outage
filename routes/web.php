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

Route::get('/add',[App\Http\Controllers\Admin\AddController::class, 'index'])->middleware(['auth','isAdmin'])->name('add');
Route::post('/add',[App\Http\Controllers\Admin\AddController::class, 'store'])->middleware(['auth','isAdmin'])->name('store');

Route::post('/update',[App\Http\Controllers\Admin\UpdateController::class, 'update'])->middleware(['auth','isAdmin'])->name('update');
Route::post('/selete',[App\Http\Controllers\Admin\DeleteController::class, 'delete'])->middleware(['auth','isAdmin'])->name('delete');

Route::get('/trash',[App\Http\Controllers\Admin\TrashController::class, 'index'])->middleware(['auth','isAdmin'])->name('trash');
Route::post('/trash',[App\Http\Controllers\Admin\TrashController::class, 'hardDelete'])->middleware(['auth','isAdmin'])->name('hardDelete');

Route::post('/restore',[App\Http\Controllers\Admin\RestoreController::class, 'restore'])->middleware(['auth','isAdmin'])->name('restore');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
