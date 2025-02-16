<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationController;

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
Route::middleware(['count_cart'])->group(function () {
    Route::get('/', [LandingController::class, 'home']);
    Route::get('/search', [LandingController::class, 'search'])->name('search');
});

Route::middleware(['check_login_admin:1'])->group(function(){
    Route::prefix('admin')->group(function (){
        Route::get('/', [AdminController::class, 'dashboard']);
    });
});



Route::get('/auth_sad', [AuthController::class, 'login_page_admin']);
Route::post('/process_auth_sad', [AuthController::class, 'login_admin']);
Route::get('/auth', [AuthController::class, 'auth_page']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forgot_password', [AuthController::class, 'forgot_passwrod_users']);
Route::get('/register', [AuthController::class, 'register_users']);
Route::post('/register_users', [AuthController::class, 'register_process_user']);
Route::post('/process_auth', [AuthController::class, 'process_auth']);

// verify account
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
->middleware(['signed'])
->name('verification.verify');

// page verify
Route::get('/verfication/success', function(){
    return view('email.verify_success');
})->name('verification.success');

Route::get('/verification/already', function(){
    return view('email.verify_already');
})->name('verification.already_verified');

Route::get('/verification/failed', function(){
    return view('email.verify_fail');
})->name('verification.failed');
