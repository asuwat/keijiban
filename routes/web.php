<?php
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;

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
Route::resource('/post','PostsController');
Route::get('/post/tag','PostsController@tag')->name('post.tag');;
Route::get('/', function () {
    return redirect('/post');
});

Auth::routes();
Route::resource('user','UsersController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('comments', 'CommetnsController');
Route::resource('tab','TagsController');

