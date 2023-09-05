<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RefundController;
use App\Http\Controllers\Api\V1\XmlController;

Route::post('customer/upload', [RefundController::class, 'uploadCustomers']);
Route::get('xmls', [XmlController::class, 'listXML']);
Route::get('xml/{id}/download', [XmlController::class, 'download']);
Route::get('xml/{id}', [XmlController::class, 'xmlById']);
Route::get('xml/{id}/log', [XmlController::class, 'logById']);


Route::get('/login', '');
