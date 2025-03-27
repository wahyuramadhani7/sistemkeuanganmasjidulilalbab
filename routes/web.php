<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ZakatController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/finances');
    }
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/finances', [FinanceController::class, 'index'])->name('finances.index');
    Route::post('/finances', [FinanceController::class, 'store'])->name('finances.store');
    Route::delete('/finances/{id}', [FinanceController::class, 'destroy'])->name('finances.destroy');
    Route::get('/finances/export', [FinanceController::class, 'export'])->name('finances.export');
    Route::get('/finances/summary', [FinanceController::class, 'summary'])->name('finances.summary');
    Route::post('/finances/summary', [FinanceController::class, 'storeSummary'])->name('finances.storeSummary');
    Route::get('/finances/export-summary', [FinanceController::class, 'exportSummary'])->name('finances.exportSummary'); // Route untuk export summary
    Route::get('/zakats', [ZakatController::class, 'index'])->name('zakats.index');
    Route::post('/zakats', [ZakatController::class, 'store'])->name('zakats.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});