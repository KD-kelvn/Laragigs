<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ListingsController;

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

Route::get('/', [ListingsController::class, 'index']);

Route::get('/Listings/create', [ListingsController::class, 'create'])->middleware('auth');
Route::post('/Listings/store', [ListingsController::class, 'store']);
Route::get("/listings/manage", [ListingsController::class, 'manage'])->middleware('auth');
Route::get('/Listings/{listing}/edit', [ListingsController::class, 'edit']);
Route::get('/register', [ListingsController::class, 'register'])->middleware('guest');
Route::put('/listings/{listing}', [ListingsController::class, 'update']);
Route::delete('/listings/{listing}', [ListingsController::class, 'destroy']);
Route::get('/listings/{listing}', [ListingsController::class, 'show']);

Route::post('/users', [UsersController::class, 'store']);
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UsersController::class, 'authenticate']);
Route::post('/logout', [UsersController::class, 'logout']);