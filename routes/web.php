<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Section\CompanyController;
use App\Http\Controllers\Web\Section\ExcelController;
use App\Http\Controllers\Web\Statics\AuthController;
use App\Http\Controllers\Web\Statics\DashboardController;

/**
 * Authentication Routes
 */
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'attempt'])->name('auth.login.post');

/**
 * Authenticated User Routes
 */
Route::middleware(['auth:web'])->group(function () {
    /**
     * Dashboard Routes
     */
    Route::get('/dashboard', DashboardController::class)->name('panel.dashboard');

    /**
     * Company Routes
     */
    Route::get('/company', [CompanyController::class, 'edit'])->name('panel.company.edit');
    Route::put('/company/update', [CompanyController::class, 'update'])->name('panel.company.update');

    /**
     * Excel Routes
     */
    Route::get('/excel/init', [ExcelController::class, 'init'])->name('panel.excel.init');
    Route::post('/excel/upload', [ExcelController::class, 'upload'])->name('panel.excel.upload');

    /**
     * XML Routes
     */
    Route::get('xml/{id}', [ExcelController::class, 'xml'])->name('panel.xml.show');
    Route::get('xml/{id}/download', [ExcelController::class, 'download'])->name('panel.xml.download');
});
