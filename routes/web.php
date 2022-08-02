<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->middleware('permission:Create new user');
Route::post('/user/store', [UserController::class, 'store'])->middleware('permission:Create new user');
Route::get('/user/show/{id}', [UserController::class, 'show'])->middleware('permission:View users');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('permission:Edit users');
Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware('permission:Edit users|Edit own user');
Route::post('/user/delete/{id}', [UserController::class, 'delete'])->middleware('permission:Remove user');
Route::get('/user/password/{id}', [UserController::class, 'password'])->middleware('permission:Edit users');
Route::post('/user/changepassword/{id}', [UserController::class, 'changePassword'])->middleware('permission:Edit users|Edit own user');

//use App\Http\Controllers\ProfileController;
Route::get('/profile', [ProfileController::class, 'index'])->middleware('permission:View own details|Edit own user');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('permission:Edit own user');
Route::get('/profile/edit/password', [ProfileController::class, 'editPassword'])->middleware('permission:Edit own user');
