<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\GroupStoryController;
use App\Http\Controllers\ParticularController;
use App\Http\Controllers\UserDetailController;

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
    Route::post('/edit/interest',[UserDetailController::class,'editMyInterest'])->name('edit.myInterest');
    Route::post('/edit/event',[UserDetailController::class,'editEvent'])->name('edit.event');
    Route::get('/all/interest',[InterestController::class,'interests'])->name('all.interest');
    Route::post('/add/interest',[InterestController::class,'addInterests'])->name('add.interest');
    Route::get('/my/interest/{id}',[InterestController::class,'myInterests'])->name('my.interest');
    Route::get('/my/profile',[App\Http\Controllers\UserDetailController::class,'myProfile'])->name('my.profile');
    Route::post('/follow/request',[FeedsController::class,'follow_request'])->name('follow.request');
    Route::post('/accept/follow/request',[FeedsController::class,'followRequestAccepted'])->name('accept.follow.request');
    Route::post('/like/feed',[FeedsController::class,'likeFeed'])->name('like.feed');
    Route::post('/post/comment',[CommentController::class,'PostComment'])->name('post.comment');
    Route::get('/events',[EventController::class,'index'])->name('events.list');
    Route::get('/create/event',[EventController::class,'createEvent'])->name('create.event');
    Route::post('/store/event',[EventController::class,'storeEvent'])->name('store.event');
    Route::get('/event/detail/{id}',[EventController::class,'eventDetail'])->name('event.detail');
  //Route::post('/upload/feed',[FeedsController::class,'storeFeed'])->name('store.feed');
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
    Route::post('/group/post/comment',[GroupController::class,'groupPostComment'])->name('group.post.comment');
    Route::post('/show/group/comments',[GroupController::class,'showGroupComments'])->name('show.group.comments');
    Route::post('/like/group/post',[GroupController::class,'likeGroupPost'])->name('like.group.post');
    Route::get('/book/event/{id}',[EventController::class,'bookEvent'])->name('book.event');
    Route::post('/store/event/booking',[EventController::class,'eventBooking'])->name('event.booking');
    Route::post('search/tag/{tag}',[InterestController::class,'searchByTag'])->name('tag.search');
    Route::post('/search/interest',[InterestController::class, 'searchInterest'])->name('search.interest');
    Route::post('/search/interest/{interest}',[InterestController::class, 'searchByInterest'])->name('search.by.interest');
    Route::post('share/feed',[FeedsController::class,'shareFeed'])->name('share.feed');
    Route::get('/friend/list',[UserDetailController::class,'friendlist'])->name('friend.list');
    Route::get('/my/feeds',[FeedsController::class,'myNews'])->name('my.news');
    Route::get('/my/calendar',[UserDetailController::class,'myCalendar'])->name('my.calendar');
    Route::post('/update/image',[UserDetailController::class,'updateImage'])->name('update.image');
    Route::get('/search',[FeedsController::class,'searchForm'])->name('search.form');
    Route::get('/search/by/name',[InterestController::class,'searchByName'])->name('search.name');
    Route::post('search/{name}',[InterestController::class, 'nameSearch'])->name('name.search');
    Route::get('/spin/the/wheel',[UserDetailController::class,'spinTheWheel'])->name('spin.the.wheel');
    Route::post('updateStory',[UserDetailController::class,'updateStory'])->name('my.story');
    Route::get('bookmarks',[BookmarkController::class,'myBookmarks'])->name('my.bookmarks');
    Route::post('add/bookmarks',[BookmarkController::class,'addBookmarks'])->name('add.bookmarks');
    Route::get('group/member/{id}',[GroupController::class,'groupMembers'])->name('group.member');
    Route::get('profile/{id}/{name}',[UserDetailController::class,'publicProfile'])->name('public.profile');
    Route::get('suggest/mcguffin',[InterestController::class,'suggestMcguffin'])->name('suggest.mcguffin');
    Route::get('my/circle',[GroupController::class,'myCircle'])->name('my.circle');
    Route::get('create/bookmark/{name}',[BookmarkController::class,'createBookmark'])->name('create.bookmark');
    Route::get('/quiz',[QuizController::class,'index'])->name('quiz');
    Route::post('privacy',[UserDetailController::class,'privacySetting'])->name('privacy');
    Route::get('/accept/request/{id}',[UserDetailController::class,'acceptRequest'])->name('accept.request');
    Route::get('/particulars',[ParticularController::class,'index'])->name('particulars');
    Route::get('/create/particulars',[ParticularController::class,'create'])->name('particular.create');
    Route::post('/particulars',[ParticularController::class,'store'])->name('store.particular');
    Route::get('group/story/{id}',[App\Http\Controllers\GroupStoryController::class,'index'])->name('add.story');
    Route::post('/group/store',[App\Http\Controllers\GroupStoryController::class,'store'])->name('group.story');
});

Route::middleware('auth')->prefix('group')->group(function(){

    Route::get('particulars/{id}',[App\Http\Controllers\GroupStoryController::class,'particulars'])->name('group.particulars');

});




Route::get('mcguffin',[FrontEndController::class,'mcguffin'])->name('mcguffin.deatil');

Route::get('/signup',[FrontEndController::class,'signup'])->name('signup');
Route::post('/signup',[FrontEndController::class,'signupUser'])->name('signup.user');
Route::prefix('api')->group(function(){
    Route::get('/all/interest', [InterestController::class,'getinterest']);

});

// Auth::routes(['register'=>false,'password.request'=>false,
//             'password.reset'=>false,
//             'password.update'=>false,
//             'password.confirm'=>false,
//             ]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('api')->group(function () {

    Route::get('/conversations',[MessengerController::class,'getConversations']);
    Route::get('/messages',[MessengerController::class,'getMessages']);
});
// Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

