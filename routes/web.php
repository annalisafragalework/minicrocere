<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DottoriController;
use App\Http\Controllers\UtenteController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;

// Homepage pubblica
Route::get('/', function () {
    return view('dashboard.index');
});

// Login e autenticazione
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

// Gruppo protetto da middleware auth
Route::middleware(['auth'])->group(function () {

    // Dashboard admin
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/dottori', [AdminController::class, 'dottori'])->name('admin.dottori');
    Route::get('/admin/api', [AdminController::class, 'api'])->name('admin.api');

    // Calendarizzazione appuntamenti
    Route::get('/admin/dottori/calendar', [AppointmentController::class, 'calendarioDottori'])
        ->name('admin.dottori.calendar');
    Route::post('/appointments/generate-slots', [AppointmentController::class, 'generateSlots'])
        ->name('appointments.generate-slots');
    Route::post('/appointments/delete-past-slots', [AppointmentController::class, 'deletePastSlots'])
        ->name('appointments.delete-past-slots');

    // Resource Dottori
    Route::resource('admin/dottori', UtenteController::class)
        ->parameters(['dottori' => 'dottore'])
        ->names([
            'index'   => 'admin.dottori.index',
            'create'  => 'admin.dottori.create',
            'store'   => 'admin.dottori.store',
            'edit'    => 'admin.dottori.edit',
            'update'  => 'admin.dottori.update',
            'destroy' => 'admin.dottori.destroy',
        ]);

    // Resource Pazienti annidati sotto Dottori
    Route::resource('admin/dottori.pazienti', UtenteController::class)
        ->parameters(['dottori' => 'dottore', 'pazienti' => 'paziente'])
        ->names([
            'index'   => 'admin.dottori.pazienti.index',
            'create'  => 'admin.dottori.pazienti.create',
            'store'   => 'admin.dottori.pazienti.store',
            'show'    => 'admin.dottori.pazienti.show',
            'edit'    => 'admin.dottori.pazienti.edit',
            'update'  => 'admin.dottori.pazienti.update',
            'destroy' => 'admin.dottori.pazienti.destroy',
        ]);

    // Rotta personalizzata per visualizzare tutti i pazienti di un dottore
    Route::get('admin/dottori/{dottore}/pazienti-lista', [UtenteController::class, 'pazientiDelDottore'])
        ->name('admin.dottori.pazienti.delDottore');
});
