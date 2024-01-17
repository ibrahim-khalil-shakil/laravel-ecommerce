<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

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

Route::get('/register', [AuthenticationController::class, 'signUpForm'])->name('register');
Route::post('/register', [AuthenticationController::class, 'signUpStore'])->name('register.store');
Route::get('/login', [AuthenticationController::class, 'signInForm'])->name('login');
Route::post('/login', [AuthenticationController::class, 'signInCheck'])->name('login.check');
Route::get('/logOut', [AuthenticationController::class, 'signOut'])->name('logOut');





Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     dd("Reached the dashboard route.");
//     return view('dashboard');
// })->name('dashboard')->middleware('superadmin');

// Route::middleware(['superadmin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('superadmin');


// Route::group(['middleware' => ['auth', 'superadmin']], function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
