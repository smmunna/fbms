<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\user\ProfileController;
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

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit-profile');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('update-profile');

// Admin Access
Route::middleware('checkUserRole:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/userlist', [UserController::class, 'userList'])->name('admin.userlist');
    Route::get('/search/user-list', [UserController::class, 'userListSearch'])->name('user.list.search');
    Route::get('/user/{id}', [UserController::class, 'viewUser'])->name('admin.user.view');
    Route::delete('/user/{id}', [UserController::class, 'deleteUser'])->name('admin.user.delete');
    // Add more routes as needed...
    Route::resource('properties', PropertyController::class);
    Route::resource('locations', LocationController::class);
});

Route::middleware('checkUserRole:user')->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    // Add more routes as needed...
});

Route::middleware('checkUserRole:owner')->group(function () {
    Route::get('/owner/dashboard', [DashboardController::class, 'index'])->name('owner.dashboard');
    // Add more routes as needed...
});


// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
