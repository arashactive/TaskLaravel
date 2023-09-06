<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RefundController;
use App\Http\Controllers\Api\V1\XmlController;
use App\Http\Controllers\web\section\CompanyController;
use App\Http\Controllers\web\section\ExcelController;
use App\Http\Controllers\web\statics\AuthController;
use App\Http\Controllers\web\statics\DashboardController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'attempt'])->name('auth.login.post');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('panel.dashboard');
    
    Route::get('/company', [CompanyController::class, 'edit'])->name('panel.company.edit');
    Route::put('/company/update', [CompanyController::class, 'update'])->name('panel.company.update');

    Route::get('/excel/init', [ExcelController::class, 'init'])->name('panel.excel.init');
    Route::post('/excel/upload', [ExcelController::class, 'upload'])->name('panel.excel.upload');

    Route::post('customer/upload', [RefundController::class, 'uploadCustomers']);
    Route::get('xmls', [XmlController::class, 'listXML']);
    Route::get('xml/{id}/download', [XmlController::class, 'download']);
    Route::get('xml/{id}', [XmlController::class, 'xmlById']);
    Route::get('xml/{id}/log', [XmlController::class, 'logById']);
});
