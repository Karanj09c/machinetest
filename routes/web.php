<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function () {

    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');

    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cleared!";
});

Route::post('logout', function() {

    Auth::logout();
    return redirect('/'); // Redirect to the home page, change the URL as needed
});

Route::get('/',function(){
    return view('welcome');
});
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
Route::post('/book-appointment', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('/register', [CustomRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [CustomRegisterController::class, 'register']);
Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login']);
