<?php

use App\Http\Controllers\Api\BusinessInfoController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/business-info', [BusinessInfoController::class, 'show']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1'); // 5 requests per minute per IP