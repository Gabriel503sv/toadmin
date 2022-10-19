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
    return redirect()->route('login');
});


Route::prefix('admin')->group(function(){
    //login
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'loginVerify'])->name('login.verify');
    //cerrar session
    Route::post('signOut',[AuthController::class,'signOut'])->name('signOut');  
   
    
});

//protegidas

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        //Usuario
        //Route::get('usuario',[AuthController::class,'register'])->name('usuario');
        //Route::post('usuario',[AuthController::class,'registerVerfy']);
        
        //dashboar 
        Route::get('usuario',[AuthController::class,'register'])->name('usuario');
        Route::post('usuario',[AuthController::class,'registerVerify']);
        Route::post('usuario/{id}/destroy',[AuthController::class,'destroy'])->name('destroy');
        Route::get('dashboard',function(){
            return view('dashboard.dashboard');
        })->name('dashboard');


        //Proveedor
        Route::resource('proveedor',ControllerProveedor::class);

    });
    
});

