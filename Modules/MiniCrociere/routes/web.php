<?php

// use Illuminate\Support\Facades\Route;
// use Modules\MiniCrociere\Http\Controllers\MiniCrociereController;

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::resource('minicrocieres', MiniCrociereController::class)->names('minicrociere');
// });
use Illuminate\Support\Facades\Route;

Route::get('/minicrociere', function () {
    return view('minicrociere::index');
});
