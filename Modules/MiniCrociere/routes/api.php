<?php

use Illuminate\Support\Facades\Route;
use Modules\MiniCrociere\Http\Controllers\MiniCrociereController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('minicrocieres', MiniCrociereController::class)->names('minicrociere');
});
