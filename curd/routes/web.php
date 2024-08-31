<?php

use App\Http\Controllers\UserController;
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



Route::get('/',[UserController::class, 'UsersRead'])->name('homepage.viewuser');
Route::get('adduser',[UserController::class, 'UsersAdd'])->name('add.user');
Route::post('saveuser',[UserController::class, 'UsersSave'])->name('save.user');
Route::get('deleteuser/{id}',[UserController::class, 'UsersDelete'])->name('delete.user');
Route::get('edituser/{id}',[UserController::class, 'UsersEdit'])->name('edit.user');
Route::post('updateuser',[UserController::class, 'UsersUpdate'])->name('update.user');
