<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Web\User\DashboardController as UserDashboardController;

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

Auth::routes();

Route::group([
    'middleware' => 'role:admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Web\Admin'
    ], function() {
        Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
});
//Route::get('/admin_dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');

Route::group([
    'middleware' => 'role:user',
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'Web\User'
    ], function() {
        Route::get('/dashboard', [UserDashboardController::class,'index'])->name('dashboard');
});
//Route::get('/user_dashboard', [UserDashboardController::class,'index'])->name('user.dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
