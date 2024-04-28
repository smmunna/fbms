<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\HomeController;
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
})->name('welcome');

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

// Flat also added comment here
Route::get('/details/flat/{id}', [FlatController::class, 'publicFlatDetails'])->name('public.flat.details');

// Comment and Rating
Route::resource('comments', CommentController::class);

// All Properties
Route::get('/all/properties', [HomeController::class, 'allProperties'])->name('home.all.properties');
// Define route for filtering properties
Route::get('/filter-properties', [HomeController::class, 'filter'])->name('filter.properties');


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
    Route::get('/all/flat', [FlatController::class, 'adminAllFlat'])->name('admin.all.flat');
    Route::get('/search/flat', [FlatController::class, 'adminSearchAllFlat'])->name('admin.flats.search');
    Route::get('/pendings/flat', [FlatController::class, 'adminPendingFlats'])->name('pending.flat');
    Route::get('/details/flat/{id}', [FlatController::class, 'adminFlatDetails'])->name('admin.flat.details');
    Route::put('/flats/{id}/approve', [FlatController::class, 'adminApproveFlat'])->name('flat.approve');
    Route::delete('/flats/{id}/delete', [FlatController::class, 'adminDestroyPending'])->name('flat.delete');

    Route::put('/flats/{id}/toggle-featured', [FlatController::class, 'toggleFeatured'])->name('flats.toggle-featured');
});

Route::middleware('checkUserRole:user')->prefix('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    // Add more routes as needed...
});

Route::middleware('checkUserRole:owner')->prefix('owner')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('owner.dashboard');
    Route::resource('flats', FlatController::class);
    Route::get('/search/flat', [FlatController::class, 'search'])->name('flats.search');
    // Add more routes as needed...
});


// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
