<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Web\Admin\SerieController as AdminSerieController;
use App\Http\Controllers\Web\Admin\SeasonController as AdminSeasonController;
use App\Http\Controllers\Web\Admin\EpisodeController as AdminEpisodeController;
use App\Http\Controllers\Web\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\HomeController as GuestHomeController;
use App\Http\Controllers\Web\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Web\User\SerieController as UserSerieController;
use App\Http\Controllers\Web\User\MovieController as UserMovieController;

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

Route::get('/', [GuestHomeController::class,'welcome'])->name('welcome');
Route::prefix('user')->group( function(){
    Route::get('/movies', [UserMovieController::class,'index'])->name('movie.index');
    Route::get('/movie/{slug}', [UserMovieController::class,'showMovie'])->name('movie.show');
    Route::get('/categorie/{name}', [GuestHomeController::class,'showCategory'])->name('category.show');
    Route::get('/series', [UserSerieController::class,'index'])->name('serie.index');
    Route::get('/serie/{slug}', [UserSerieController::class,'show'])->name('serie.show');
    Route::get('/season/{id}', [GuestHomeController::class,'showSeason'])->name('season.show');
    Route::get('/serie/{slug}/season/{title}/episode/{id}', [UserSerieController::class,'showEpisode'])->name('episode.show');
    Route::get('/search', [GuestHomeController::class,'search'])->name('search');
});

Auth::routes();

Route::group([
    'middleware' => 'role:admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    ], function() {
        Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
        Route::resource('serie', AdminSerieController::class);
        Route::resource('season', AdminSeasonController::class);
        Route::resource('episode', AdminEpisodeController::class);
        Route::resource('movie', AdminMovieController::class);
});
//Route::get('/admin_dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');

Route::group([
    'middleware' => 'role:user',
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'Web\User'
    ], function() {
        Route::get('/dashboard', [UserDashboardController::class,'index'])->name('dashboard');
        Route::get('profile', [UserDashboardController::class,'profile'])->name('profile');
});
//Route::get('/user_dashboard', [UserDashboardController::class,'index'])->name('user.dashboard');
Route::get('/home', [UserDashboardController::class, 'index'])->name('home');
