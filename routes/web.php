<?php

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
    return view('welcome')->name('home');
});

Route::group(['namespace' => 'Post', 'middleware' => 'user'], function () {
    Route::get('/post','IndexController')->name('post.index');
    Route::get('/post/create','CreateController')->name('post.create');
    Route::post('/post','StoreController')->name('post.store');
    Route::get('/post/{post}','ShowController')->name('post.show');
    Route::get('/post/{post}/edit','EditController')->name('post.edit');
    Route::patch('/post/{post}','UpdateController')->name('post.update');
    Route::delete('/post/{post}','DeleteController')->name('post.delete');
});

Route::group(['namespace' => 'Admin' , 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post','IndexController')->name('admin.post.index');
        Route::get('/post/create','CreateController')->name('admin.post.create');
        Route::post('/post','StoreController')->name('admin.post.store');
        Route::get('/post/{post}','ShowController')->name('admin.post.show');
        Route::get('/post/{post}/edit','EditController')->name('admin.post.edit');
        Route::patch('/post/{post}','UpdateController')->name('admin.post.update');
        Route::delete('/post/{post}','DeleteController')->name('admin.post.delete');
    });
});

Route::get('/post/create-post','PostController@createPosts');
Route::get('/post/update-post','PostController@updatePosts');
Route::get('/post/delete-post','PostController@deletePosts');
Route::get('/post/restore-post','PostController@restorePosts');
Route::get('/post/first-create','PostController@fisrtOrCreate');
Route::get('/post/update-create','PostController@updateOrCreate');


Route::get('/main','MainController@main')->name('main.main');
Route::get('/contacts','MainController@contacts')->name('main.contacts');
Route::get('/about','MainController@about')->name('main.about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
