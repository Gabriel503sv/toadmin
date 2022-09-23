<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ControllerProveedor;
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


Route::prefix('admin')->group(function(){
    //login
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'loginVerify'])->name('login.verify');
    //cerrar session
    Route::post('signOut',[AuthController::class,'signOut'])->name('signOut');  
    Route::get('usuario',[AuthController::class,'register'])->name('usuario');
    Route::post('usuario',[AuthController::class,'registerVerify']);
    
});

//protegidas

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        //Usuario
        //Route::get('usuario',[AuthController::class,'register'])->name('usuario');
        //Route::post('usuario',[AuthController::class,'registerVerfy']);
        
        //dashboar
        Route::get('dashboard',function(){
            return view('dashboard.dashboard');
        })->name('dashboard');

        //Proveedor
        Route::get('Proveedor',[ControllerProveedor::class,'index'])->name('proveedor');
        

    });
    
});

