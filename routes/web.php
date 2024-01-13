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

Route::get('/', [userController::class, 'index']);

Route::get('/tambahUser10', [Usercontroller::class, 'tambah']);
Route::get('/hapus/{id}', [userController::class, 'hapus']);
Route::get('/hapusSemua', [userController::class, 'hapusSemua']);
