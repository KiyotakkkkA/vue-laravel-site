<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuDataController;

Route::get('/menudata', [MenuDataController::class, 'index']);

Route::get('/{any}', function () {
    return view('main');
})->where('any', '.*');

Auth::routes();
