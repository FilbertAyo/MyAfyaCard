<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\PatientRegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProfileController::class, 'redirect'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::post('/logout','Auth\LoginController@logout')->name('logout');

Route::resource('patient_register',PatientRegisterController::class);

Route::resource('pat_progress',ProgressController::class);
Route::get('progress/{id}', [ProgressController::class, 'show'])->name('progress.show');
Route::resource('admin',AdminController::class);
Route::get('low_progress', [ProgressController::class , 'low']);
Route::get('good_progress', [ProgressController::class , 'good']);
Route::get('patient_inactive',[PatientRegisterController::class,'inactive']);
Route::get('patient_active',[PatientRegisterController::class,'active']);
// Route::get('/test',[TestingController::class, 'index']);

Route::resource('reg',RegisteredUserController::class);


//patient login to access credentials

Route::get('/patient/login', [PatientAuthController::class, 'index'])->name('patient.login.form');
Route::post('/patient/login', [PatientAuthController::class, 'pat_login'])->name('patient.login');
// Route::get('/patient/dashboard', [PatientAuthController::class, 'showPatientDashboard'])->middleware('auth:patients')->name('patient.dashboard');