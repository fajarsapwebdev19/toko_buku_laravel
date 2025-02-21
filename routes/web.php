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
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/slider', [AdminController::class, 'slider'])->name('admin.slider');
        Route::get('/rekening', [AdminController::class, 'rekening'])->name('admin.rekening');
        Route::get('/account/admin', [AdminController::class, 'account_admin'])->name('admin.account_admin');
        Route::get('/account/users', [AdminController::class, 'account_users'])->name('admin.account_users');
        // master data
        Route::prefix('master_data')->group(function(){
            // role
            Route::get('/role', [AdminController::class, 'master_role'])->name('admin.master_role');
            Route::get('/get_role/{id}', [AdminController::class, 'get_role']);
            Route::get('/role_data', [AdminController::class,'role_data']);
            Route::post('/add_role', [AdminController::class, 'add_role']);
            Route::put('/update_role/{id}', [AdminController::class, 'update_role']);
            Route::delete('/delete_role/{id}', [AdminController::class, 'delete_role']);

            // sekolah
            Route::get('/sekolah', [AdminController::class, 'master_sekolah'])->name('admin.master_sekolah');
            Route::get('/get_school/{npsn}', [AdminController::class, 'get_school']);
            Route::get('/school_data', [AdminController::class, 'school_data']);
            Route::post('/add_school', [AdminController::class, 'add_school']);

            // kategori
            Route::get('/kategori', [AdminController::class, 'master_ketegori'])->name('admin.master_kategori');
            Route::get('/category_data', [AdminController::class, 'kategori_data']);

            // buku
            Route::get('/buku', [AdminController::class, 'master_buku'])->name('admin.master_buku');
            Route::get('/book_data', [AdminController::class, 'data_buku']);

        });
        Route::get('/pesanan', [AdminController::class, 'pesanan'])->name('admin.pesanan');
        Route::get('/pengiriman', [AdminController::class, 'pengiriman'])->name('admin.pengiriman');
        Route::get('/user_profile', [AdminController::class, 'user_profile'])->name('admin.profile');
        Route::get('/change_password', [AdminController::class, 'user_change_password'])->name('admin.change_password');
    });
});



Route::get('/auth_sad', [AuthController::class, 'login_page_admin']);
Route::get('/auth', [AuthController::class, 'auth_page']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forgot_password', [AuthController::class, 'forgot_passwrod_users']);
Route::get('/register', [AuthController::class, 'register_users']);
Route::post('/register_users', [AuthController::class, 'register_process_user']);
Route::post('/process_auth', [AuthController::class, 'process_auth']);
Route::post('/process_auth_sad', [AuthController::class, 'process_auth_sad']);

Route::get('/sad/logout', [AuthController::class, 'logout_sad']);

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
