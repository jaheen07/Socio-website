<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\editController;
use App\Http\Controllers\postController;
use App\Http\Controllers\commentreplycontroller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[frontendController::class,'landing_page']);
Route::get('/home',[frontendController::class,'home_page']);
Route::get('/profile',[frontendController::class,'profile_page']);
Route::get('/jobs',[frontendController::class,'job_page']);
Route::get('/photos',[frontendController::class,'photos']);
Route::get('/videos',[frontendController::class,'videos']);
Route::get('/friends',[frontendController::class,'friends']);
Route::get('/groups',[frontendController::class,'groups']);
Route::get('/about',[frontendController::class,'about']);
Route::post('/register',[loginController::class,'register']);
Route::post('/login',[loginController::class,'login']);
Route::get('/logout',[loginController::class,'logout']);
Route::post('/active_status',[frontendController::class,'active_status_control']);
Route::get('/settings',[frontendController::class,'settings']);

//edit
Route::post('/edit/pro',[editController::class,'edit_pro_pic']);
Route::post('/edit/cvr',[editController::class,'edit_cvr_pic']);

//post
Route::post('/post',[postController::class,'post_entry']);
Route::post('/post_job',[postController::class,'job_entry']);
Route::post('/share_post',[postController::class,'share_entry']);

//other friend profile
Route::get('/{name}/{id}',[frontendController::class,'friend_profile']);

//friend request
Route::post('/friend_request',[postController::class,'friend_req']);
Route::post('/request_confirm',[postController::class,'req_confirm']);
Route::post('/cancel_friend_request',[postController::class,'cancel_req']);
Route::post('/unfriend',[postController::class,'unfriend']);
// Route::post('/delete',[postController::class,'delete_req']);
Route::get('/delete',[postController::class,'delete_req']);
Route::get('/confirm',[postController::class,'confirm_req']);

//comment - reply
Route::post('/comment_entry',[commentreplycontroller::class,'comment_entry']);
Route::post('/reply_entry',[commentreplycontroller::class,'reply_entry']);

Route::post('/reacted',[postcontroller::class,'react_entry']);

Route::post('/dark_mode',[frontendController::class,'dark_mode']);


Route::post('/edit_profile',[frontendController::class,'edit_profile2']);

Route::post('/edit_edu',[frontendController::class,'edit_edu2']);

Route::post('/edit_work',[frontendController::class,'edit_work2']);


Route::post('/change_pass',[frontendController::class,'change_pass']);

Route::get('/reset_pass',[frontendController::class,'reset_pass']);
Route::post('/sent_link',[frontendController::class,'link_sent']);
Route::post('/new_pass',[frontendController::class,'change_password']);
Route::post('/set_pass',[frontendController::class,'set_password']);

//searchbar
Route::post('/search_cont',[postController::class,'search_content']);

