<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
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
    Route::get('/new/feeds',[FeedsController::class,'newFeeds'])->name('new.feeds');
    Route::get('/feeds',[FeedsController::class,'feeds'])->name('feeds');
    Route::get('inbox/messages',[MessengerController::class,'index'])->name('messages');
    Route::get('account/setting',[UserDetailController::class,'profileSetting'])->name('profile');
    Route::post('/edit/profile',[UserDetailController::class,'editProfile'])->name('edit.profile');
    Route::get('/all/interest',[InterestController::class,'interests'])->name('all.interest');
    Route::post('/add/interest',[InterestController::class,'addInterests'])->name('add.interest');
    Route::get('/my/interest/{id}',[InterestController::class,'myInterests'])->name('my.interest');
    Route::get('/my/profile',[App\Http\Controllers\UserDetailController::class,'myProfile'])->name('my.profile');
    Route::post('/follow/request',[FeedsController::class,'follow_request'])->name('follow.request');
    Route::post('/like/feed',[FeedsController::class,'likeFeed'])->name('like.feed');
    Route::post('/post/comment',[CommentController::class,'PostComment'])->name('post.comment');
    Route::get('/events',[EventController::class,'index'])->name('events.list');
    Route::get('/create/event',[EventController::class,'createEvent'])->name('create.event');
    Route::post('/store/event',[EventController::class,'storeEvent'])->name('store.event');
    Route::get('/event/detail/{id}',[EventController::class,'eventDetail'])->name('event.detail');
    // Route::post('/upload/feed',[FeedsController::class,'storeFeed'])->name('store.feed');
    Route::post('/store/feed',[FeedsController::class , 'storeFeed'])->name('create.feeds');
    Route::get('/groups',[GroupController::class,'index'])->name('group.list');
    Route::get('/create/group',[GroupController::class,'createGroup'])->name('create.group');
    Route::post('/store/group',[GroupController::class,'storeGroup'])->name('store.group');
    Route::get('/group/detail/{id}',[GroupController::class,'groupDetail'])->name('event.group');
    Route::post('/show/more/{id}',[FeedsController::class,'showMore'])->name('show.more');
    Route::post('/search/people',[FeedsController::class,'searchPeople'])->name('search.people');
    Route::get('/show/member/{id}',[FeedsController::class,'showMember'])->name('show.member');
    Route::get('/group/{id}',[GroupController::class,'showGroup'])->name('show.group');
    Route::get('/join/group',[GroupController::class,'join'])->name('join.group');
    Route::post('/create/group/post',[GroupController::class,'createPost'])->name('create.group.post');
    Route::get('/create/group/event/{id}',[EventController::class,'createGroupEvent'])->name('create.group.event');
    Route::post('/accept/join/request',[GroupController::class,'acceptJoinRequest'])->name('accept.join.request');

});



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
