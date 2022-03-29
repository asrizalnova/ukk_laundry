<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
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
    Route::get('/register',[registerController::class, 'register'])->name('register');
    // Route::resource('/reg', registerController::class);

    //Dashboard
    Route::get('/index',[DashboardController::class,'Dashboard'])->name('dashboard');
    
    //outlet
    Route::get('/outlet',[OutletController::class,'getoutlet'])->name('outlet');
    Route::get('/outlet/tambah',[outletController::class,'tambah'])->name('tambah-outlet');
    Route::post('/outlet/tambah',[outletController::class,'insert'])->name('simpan-outlet');
    Route::get('/outlet/edit/{id}',[outletController::class,'edit'])->name('edit-outlet');
    Route::put('/outlet/edit/{id}',[outletController::class,'update'])->name('update-outlet');
    Route::delete('/outlet/delete/{id}',[outletController::class,'hapus'])->name('hapus-outlet');
    

    //Paket
    Route::get('/paket',[PaketController::class,'getpaket'])->name('paket');
    Route::get('/paket/tambah',[paketController::class,'tambah'])->name('tambah-paket');
    Route::post('/paket/tambah',[paketController::class,'insert'])->name('simpan-paket');
    Route::get('/paket/edit/{id}',[paketController::class,'edit'])->name('edit-paket');
    Route::put('/paket/edit/{id}',[paketController::class,'update'])->name('update-paket');
    Route::delete('/paket/delete/{id}',[paketController::class,'hapus'])->name('hapus-paket');




    // Member
    Route::get('/member',[MemberController::class,'getmember'])->name('member');
    Route::get('/member/tambah',[MemberController::class,'tambah'])->name('tambah-member');
    Route::post('/member/tambah',[MemberController::class,'insert'])->name('simpan-member');
    Route::get('/member/edit/{id}',[MemberController::class,'edit'])->name('edit-member');
    Route::put('/member/edit/{id}',[MemberController::class,'update'])->name('update-member');
    Route::delete('/member/delete/{id}',[MemberController::class,'hapus'])->name('hapus-member');



    //User
    Route::get('/user',[UserController::class,'getuser'])->name('user');
    Route::get('/user/tambah',[UserController::class,'tambah'])->name('tambah-user');
    Route::post('/user/tambah',[UserController::class,'insert'])->name('simpan-user');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('edit-user');
    Route::put('/user/edit/{id}',[UserController::class,'update'])->name('update-user');
    Route::delete('/user/delete/{id}',[UserController::class,'hapus'])->name('hapus-user');


    //Transaksi
    Route::get('/transkasi',[TransaksiController::class,'gettransaksi'])->name('transaksi');
    Route::get('/transaksi/tambah',[TransaksiController::class,'tambah'])->name('tambah-transaksi');
    Route::post('/transaksi/tambah',[TransaksiController::class,'insert'])->name('simpan-transaksi');
    Route::get('/transaksi/edit/{id}',[TransaksiController::class,'edit'])->name('edit-transaksi');
    Route::put('/transaksi/edit/{id}',[TransaksiController::class,'update'])->name('update-transaksi');
    Route::delete('/transaksi/delete/{id}',[TransaksiController::class,'hapus'])->name('hapus-transaksi');
    
        //logout
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');




