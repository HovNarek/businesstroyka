<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);



Route::get('/login/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/login/facebook/redirect', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

Route::get('/login/vk/redirect', [LoginController::class, 'redirectToVk'])->name('login.vk');
Route::get('/login/vk/callback', [LoginController::class, 'handleVkCallback']);

Route::get('/login/ok/redirect', [LoginController::class, 'redirectToOk'])->name('login.ok');
Route::get('/login/ok/callback', [LoginController::class, 'handleOkCallback']);




Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/get-cities', [GuestController::class, 'getCitiesByRegionId'])->name('getCities');

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    Route::resource('/specializations', SpecializationController::class);
    Route::post('/change-specialization-status', [SpecializationController::class, 'ajaxChangeSpecStatus'])->name('specializations.ajaxChangeSpecStatus');

    Route::resource('/categories', CategoryController::class);
    Route::post('/change-category-status', [CategoryController::class, 'ajaxChangeCatStatus'])->name('categories.ajaxChangeCatStatus');

    Route::resource('/users', UsersController::class);
    Route::get('/moderators', [UsersController::class, 'moderators'])->name('users.moderators');
    Route::get('/users/profile', [UsersController::class, 'profile'])->name('users.profile');

//    Route::post('/new-user-avatar-show', [UsersController::class, 'showAvatar'])->name('showAvatar');

});
