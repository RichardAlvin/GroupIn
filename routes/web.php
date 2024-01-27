<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardGroupController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\DetailGroupController;
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

//CMS
Route::get('/dashboard', function () {
    return view('CMS.dashboard');
});
Route::resource('/dashboard/groups', DashboardGroupController::class);
Route::resource('/dashboard/users', DashboardUserController::class);

//Frontend
Route::get('/', function () {
    return view('FE.home');
})->name('home');

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'loginView')->name('login');
    Route::post('/login', 'login');
    Route::get('/signup', 'signUpView');
    Route::post('/signup', 'signUp');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(GroupController::class)->group(function() {
    Route::get('/group', 'groupView');
    Route::post('/group', 'groupCreate');
    Route::put('/group/{slug}', 'groupUpdate');
    Route::delete('/group/{slug}', 'groupDelete');
})->middleware('auth');

Route::controller(DetailGroupController::class)->group(function() {
    Route::get('/detail-group/{slug}', 'groupDetailView');
    Route::POST('/detail-group/{slug}', 'joinGroup');
})->middleware('auth');
