<?php

use App\Http\Controllers\AnamneseAdultoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AtendimentoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Users
    Route::get('/users-index',[UserController::class,'index'])->name('user.index');
    Route::get('/user-edit/{id}', [UserController::class, 'edit']) -> name('user.edit');
    Route::put('/edit-update/{id}', [UserController::class, 'update'])->name('user.update');


    // Rotas de Recursos
    Route::resources([
        'cliente' => ClienteController::class,
        'anamnese-adulto' => AnamneseAdultoController::class,
        'atendimento'=> AtendimentoController::class,
    ]);

// Rotas adicionais para casos específicos
    Route::get('/meus-clientes/{id}', [ClienteController::class, 'meus_clientes'])->name('meus.clientes');
    Route::get('/anamnese-adulto/create/{cliente}', [AnamneseAdultoController::class, 'create'])->name('anamnese-adulto.create');
    Route::post('/anamnese-adulto/store/{cliente}', [AnamneseAdultoController::class, 'store'])->name('anamnese-adulto.store');
    Route::get('/anamnese-adulto/edit/{anamnese}', [AnamneseAdultoController::class, 'edit'])->name('anamnese-adulto.edit');
    Route::put('/anamnese-adulto/{cliente}/{anamnese}', [AnamneseAdultoController::class, 'update'])->name('anamnese-adulto.update');
    //Rota de busca
    Route::get('/buscar-clientes', [ClienteController::class, 'buscarClientes'])->name('clientes.buscar');









});

require __DIR__.'/auth.php';
