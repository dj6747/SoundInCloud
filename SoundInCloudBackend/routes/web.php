<?php

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

Route::get('/', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('landing_page');

Auth::routes();

Route::get('/admin-home', 'AdminHomeController@index')->name('admin_home')->middleware('admin');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/library', 'LibraryController@index')->name('library');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('/profile', 'ProfileController@update')->name('updateProfile');

Route::post('/news-feed', 'HomeController@createPost')->name('createPost');

Route::post('/like-post', 'HomeController@likePost')->name('likePost');

Route::get('/logout', function() {
    Auth::logout();
    return redirect()->route('landing_page');
});
