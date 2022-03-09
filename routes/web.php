<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\registerController;


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

// Route::get('/login', function () {
//     return view('login');
   
    //Login
    Route::get('/',[loginController::class, 'login'])->name('login');
    Route::post('/',[loginController::class, 'postlogin'])->name('postlogin');

    //register
    Route::get('/',[registerController::class, 'register'])->name('register');

    //Dashboard
    Route::get('/Dashboard',[DashboardController::class,'Dashboard'])->name('Dashboard');



