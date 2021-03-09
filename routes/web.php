<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstateController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->patch('/users/{user:slug}/add-role', [UserController::class, 'updateRole']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/users/{user:slug}/delete', [UserController::class, 'destroy']);


Route::middleware(['auth:sanctum', 'verified'])->get('/estates/create', [EstateController::class, 'create'])->name('property');
Route::middleware(['auth:sanctum', 'verified'])->get('/estates/{estate:slug}', [EstateController::class, 'show']);
Route::middleware(['auth:sanctum', 'verified'])->patch('/estates/{estate:slug}/visibility', [EstateController::class, 'visibility']);
Route::middleware(['auth:sanctum', 'verified'])->patch('/estates/{estate:slug}/publish', [EstateController::class, 'publish']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/notification', function () {
    return view('notification');
})->name('notification');