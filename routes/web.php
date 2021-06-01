<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\ClientController;
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
    Route::get('/clientes', [ClientController::class, 'index'])->name('clients');
    Route::get('/cliente-cadastro', [ClientController::class, 'create'])->name('clients-register');
    Route::post('/cliente-salvar', [ClientController::class, 'store'])->name('client-save');
    Route::get('/cliente/{client}/editar', [ClientController::class, 'edit'])->name('client-edit');
    Route::post('/cliente/salvar-edicao', [ClientController::class, 'update'])->name('client-save-edit');
    Route::get('/cliente/{client}/propostas', [ClientController::class, 'getProposals'])->name('client-props');

    Route::get('/', [ProposalController::class, 'index'])->name('home');
    Route::get('/propostas-cadastro', [ProposalController::class, 'create'])->name('props-register');
    Route::get('/set-status', [ProposalController::class, 'setStatus']);
    Route::get('/propostas/{id}/datas-de-pagamento', [ProposalController::class, 'getPaymentDates']);
    Route::post('/propostas-salvar', [ProposalController::class, 'store'])->name('props-save');
    Route::get('/proposta/{proposal}/editar', [ProposalController::class, 'edit'])->name('props-edit');
});