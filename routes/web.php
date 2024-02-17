<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\Backend\DashboardController as dashboard;
use App\Http\Controllers\Backend\UserController as user;
use App\Http\Controllers\Backend\RoleController as role;
use App\Http\Controllers\Frontend\HomeController as home;
use App\Http\Controllers\Backend\PermissionController as permission;
use App\Http\Controllers\Backend\BrandController as brand;
use App\Http\Controllers\Backend\CategoryController as category;
use App\Http\Controllers\Backend\SubcategoryController as subcategory;
use App\Http\Controllers\Backend\ProductController as product;
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

Route::get('/', [home::class, 'index'])->name('home');

Route::get('/register', [auth::class, 'signUpForm'])->name('register');
Route::post('/register', [auth::class, 'signUpStore'])->name('register.store');
Route::get('/login', [auth::class, 'signInForm'])->name('login');
Route::post('/login', [auth::class, 'signInCheck'])->name('login.check');
Route::get('/logOut', [auth::class, 'signOut'])->name('logOut');

Route::middleware(['checkAuth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [dashboard::class, 'index'])->name('dashboard');
});

Route::middleware(['checkRole'])->prefix('admin')->group(function () {
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::resource('brand', brand::class);
    Route::resource('category', category::class);
    Route::resource('subcategory', subcategory::class);
    Route::resource('product', product::class);
    Route::get('permission/{role}', [permission::class,'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class,'save'])->name('permission.save');
 });
