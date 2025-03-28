<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\QurbanController;
use Illuminate\Support\Facades\Route;

// Route untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route default (redirect ke /finances jika sudah login, ke /login jika belum)
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/finances');
    }
    return redirect('/login');
});

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Routes untuk Finances
    Route::get('/finances', [FinanceController::class, 'index'])->name('finances.index');
    Route::post('/finances', [FinanceController::class, 'store'])->name('finances.store');
    Route::delete('/finances/{id}', [FinanceController::class, 'destroy'])->name('finances.destroy');
    Route::get('/finances/export', [FinanceController::class, 'export'])->name('finances.export');
    Route::get('/finances/summary', [FinanceController::class, 'summary'])->name('finances.summary');
    Route::post('/finances/summary', [FinanceController::class, 'storeSummary'])->name('finances.storeSummary');
    Route::get('/finances/export-summary', [FinanceController::class, 'exportSummary'])->name('finances.exportSummary');

    // Routes untuk Zakats
    Route::get('/zakats', [ZakatController::class, 'index'])->name('zakats.index');
    Route::post('/zakats', [ZakatController::class, 'store'])->name('zakats.store');
    Route::get('/zakats/export', [ZakatController::class, 'export'])->name('zakats.export');

    // Routes untuk Qurbans
    Route::get('/qurbans', [QurbanController::class, 'index'])->name('qurbans.index');
    Route::get('/qurbans/create', [QurbanController::class, 'create'])->name('qurbans.create');
    Route::post('/qurbans', [QurbanController::class, 'store'])->name('qurbans.store');
    Route::get('/qurbans/export', [QurbanController::class, 'export'])->name('qurbans.export');
    Route::delete('/qurbans/{id}', [QurbanController::class, 'destroy'])->name('qurbans.destroy'); // Route yang ditambahkan

    // Route untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});