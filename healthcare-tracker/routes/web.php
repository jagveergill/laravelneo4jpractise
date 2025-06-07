<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;
use App\Http\Controllers\Doctor\PatientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return auth()->user()->role === 'doctor'
        ? view('dashboard-doctor')
        : view('dashboard-patient');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'doctor.only'])->prefix('doctor')->name('doctor.patients.')->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])->name('index');
    Route::get('/patients/conditions', [PatientController::class, 'conditions'])->name('conditions');
    Route::post('/patients/conditions', [PatientController::class, 'storeCondition'])->name('storeCondition');
});


Route::middleware(['auth', 'patient.only'])->prefix('patient')->name('patient.')->group(function () {
    Route::get('/dashboard', [PatientDashboardController::class, 'index'])->name('dashboard');
    Route::get('/graph', [PatientDashboardController::class, 'graph'])->name('graph');

});



require __DIR__.'/auth.php';
