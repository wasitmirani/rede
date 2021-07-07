<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MessengerController;

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
    Route::get('/customer/login',[FrontEndController::class,'customerLogin'])->name('customer.login');
    Route::post('/customer/login',[FrontEndController::class,'LoginUser'])->name('customer.user.login');
    Route::get('soon',[FrontEndController::class,'soon']);


});
Route::get('/new/feeds',[FeedsController::class,'newFeeds'])->name('new.feeds');
Route::get('inbox/messages',[MessengerController::class,'index'])->name('messages');
Route::get('account/setting',[MessengerController::class,'profileSetting'])->name('profile');


Auth::routes(['register'=>false,'password.request'=>false,
            'password.reset'=>false,
            'password.update'=>false,
            'password.confirm'=>false,
            ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('api')->group(function () {

    Route::get('/conversations',[MessengerController::class,'getConversations']);
    Route::get('/messages',[MessengerController::class,'getMessages']);
});
