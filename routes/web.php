<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardGroupController;
use App\Http\Controllers\DashboardUserController;
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
});
