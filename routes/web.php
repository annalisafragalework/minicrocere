<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClientController;

// Homepage pubblica
Route::get('/', function () {
    return view('home');
});

// Autenticazione Laravel
Auth::routes();

// Redirect dopo login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard Super Admin
 