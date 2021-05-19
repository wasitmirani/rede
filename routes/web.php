<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

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


Route::middleware('auth')->group(function () {
    Route::get('/',[FrontEndController::class,'index'])->name('index');
    Route::get('/welcome',[FrontEndController::class,'welcome'])->name('welcome');
    Route::get('/signup',[FrontEndController::class,'signup'])->name('signup');
    Route::get('/congs',[FrontEndController::class,'congs'])->name('congs');
    Route::get('/timeline',[FrontEndController::class,'timeLine'])->name('timeline');
    Route::get('soon',[FrontEndController::class,'soon']);
});


Auth::routes(['register'=>false,'password.request'=>false,
            'password.reset'=>false,
            'password.update'=>false,
            'password.confirm'=>false,
            ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

