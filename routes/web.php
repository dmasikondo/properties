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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::patch('/users/{user:slug}/add-role', [UserController::class, 'updateRole']);
Route::delete('/users/{user:slug}/delete', [UserController::class, 'destroy']);


Route::get('/estates/{estate:slug}', [EstateController::class, 'show']);
Route::patch('/estates/{estate:slug}/visibility', [EstateController::class, 'visibility']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
