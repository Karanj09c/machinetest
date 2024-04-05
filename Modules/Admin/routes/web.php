<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){
    Route::match(['get','post'], '/', 'AdminController@adminLogin');
    
    /* --- Middleware --- */
    Route::group(['middleware' => ['AdminAuth']], function(){
        Route::get('logout', 'AdminController@logout');
        Route::get('dashboard', 'AdminController@dashboard');
        Route::resource('users', 'UserController');
        Route::match(['get','post'], 'change-password', 'AdminController@changePassword');
        Route::post('/check_current_password', 'AdminController@CheckCurrentPassword');
        Route::post('/update-status', 'UserController@updateStatus');
        Route::get('doctors/create', 'DoctorController@create');
        Route::get('doctors', 'DoctorController@index');
        Route::post('doctors/store', 'DoctorController@store');
    });

});

/* --- cache clear routes --- */
Route::get('/clear', function() {   
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cleared!";
});
