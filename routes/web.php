<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('shared.forms.login');
})->name('login');
Route::post('/login', [AuthController::class, 'loginpage'])->name('auth.login');

Route::get('/registration', function () {
    return view('shared.forms.registration');
})->name('registration');
// Route for creating a new user
Route::post('/registration', [UserController::class, 'createUser'])->name('create-user');


// Route::get('/admin/dashboard', function () {
//     return view('pages.dashboard.dashboard');
// });

// Admin Access
Route::middleware('checkUserRole:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Add more routes as needed...
});

Route::middleware('checkUserRole:user')->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    // Add more routes as needed...
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
