<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\ProposalController;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction'])->name('login-action');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrar', [UserController::class, 'showFormRegister'])->name('register');
Route::post('/registrar', [UserController::class, 'register'])->name('register-action');


Route::middleware('auth')->group(function() {
    Route::get('/', [ProposalController::class, 'index'])->name('home');
});