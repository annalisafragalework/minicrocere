<?php

 
use Illuminate\Support\Facades\Route;

use Modules\MiniCrociere\Http\Controllers\MiniCrociereController;

Route::get('/minicrociere', [MiniCrociereController::class, 'index']);
