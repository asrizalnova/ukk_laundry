<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use GuzzleHttp\Middleware;

//Register  & Login
Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);


            Route::group(['middleware' => ['jwt.verify:admin,kasir,owner']], function () {
            Route::get('login/check', [UserController::class,'loginCheck']);
            Route::post('logout', [UserController::class,'logout']);

            //get Outlet
            Route::get('outlet', [OutletController::class, 'getAll']); 
            Route::get('outlet/{id_outlet}', [OutletController::class, 'getById']); 
        
            //REPORT
            Route::post('transaksi/report', [TransaksiController::class, 'report']); 
        });

        //Member
            Route::group(['middleware' => ['jwt.verify:admin,kasir']],function(){
            Route::post('member',[MemberController::class,'insert']);
            Route::put('member/{id}',[MemberController::class,'update']);
            Route::delete('member/{id}', [MemberController::class, 'delete']);
            Route::get('member',[MemberController::class, 'getAll']);
            Route::get('member/{id_member}',[MemberController::class, 'getById']);

            //Transaksi
            Route::post('transaksi',[TransaksiController::class,'insert']);
            Route::put('transaksi/status', [TransaksiController::class, 'update_status']);
            Route::put('transaksi/bayar', [TransaksiController::class, 'update_bayar']);
            // Route::delete('transaksi/hapus', [TransaksiController::class, 'hapus_transaksi']);
        });


            //User
            Route::group(['middleware' => ['jwt.verify:admin']], function(){
            Route::post('user', [userController::class, 'insert']);
            Route::put('user/{id}', [userController::class, 'update']);
            Route::delete('user/{id}', [userController::class, 'delete']);
            Route::get('user', [userController::class, 'getAll']);
            Route::get('user/{id_user}', [userController::class, 'getById']);

            //Outlet
            Route::post('outlet',[OutletController::class,'insert']);
            Route::put('outlet/{id}',[OutletController::class,'update']);
            Route::delete('outlet/{id}', [OutletController::class, 'delete']);
            

            //Paket
            Route::post('paket', [PaketController::class, 'insert']);
            Route::put('paket/{id}', [PaketController::class, 'update']);
            Route::delete('paket/{id}', [PaketController::class, 'delete']);
            Route::get('paket', [PaketController::class, 'getAll']);
            Route::get('paket/{id_paket}', [PaketController::class, 'getById']);
});

            







// Route::group(['middleware' => ['jwt.verify::admin,kasir']],function(){
//     Route::post('transaksi',[TransaksiController::class,'insert']);
//     Route::post('transaksi/report', [TransaksiController::class, 'report']);
//     Route::put('transaksi/status', [TransaksiController::class, 'update_status']);
//     Route::put('transaksi/bayar', [TransaksiController::class, 'update_bayar']);
// });