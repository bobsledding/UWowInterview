<?php

use App\Http\Controllers\Q12APIController;
use Illuminate\Support\Facades\Route;

Route::prefix('article')->controller(Q12APIController::class)->group(function () {
    Route::post('/create', 'create');
    Route::put('/{id}/update', 'update');
    Route::delete('/{id}/delete', 'delete');
    Route::get('/search', 'search');
    Route::put('/{id}/set_active', 'setActive');
    Route::put('/{id}/set_inactive', 'setInactive');
});
