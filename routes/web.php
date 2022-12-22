<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ManagementController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [AppController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::name('app.')->group(function () {
    Route::get('/carteiras', [AppController::class, 'index'])->middleware(['auth', 'verified'])->name('wallet');
    Route::get('/receber', [AppController::class, 'index'])->middleware(['auth', 'verified'])->name('toReceive');
    Route::get('/pagar', [AppController::class, 'index'])->middleware(['auth', 'verified'])->name('toPay');
    Route::get('/fixas', [AppController::class, 'index'])->middleware(['auth', 'verified'])->name('fixed');
});

Route::name('gerenciamento.')->group(function () {
    Route::get('/gerenciamento', [ManagementController::class, 'index'])->middleware(['auth', 'verified'])->name('index');
    Route::get('/operacional', [OperationController::class, 'index'])->middleware(['auth', 'verified'])->name('operationals');
    Route::get('/ativos', [AssetsController::class, 'index'])->middleware(['auth', 'verified'])->name('assets');
});














Route::get('/components/buttons', function () {
    return Inertia::render('Components/Buttons');
})->middleware(['auth', 'verified'])->name('components.buttons');

require __DIR__ . '/auth.php';
