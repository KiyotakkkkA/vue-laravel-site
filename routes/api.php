<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\MenuDataController;
use App\Http\Controllers\Api\CheckAuthController;

Route::get('/menudata', [MenuDataController::class, 'index']);
Route::post('/checkauth', [CheckAuthController::class, 'index']);
