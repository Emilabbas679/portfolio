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

Route::prefix('admin')->group(function() {
    Route::get('/','Admin\AdminController@index')->name('admin.home');
    Route::Resource('users', 'Admin\UsersController');
    Route::Resource('langs', 'Admin\LanguageController');
    Route::Resource('role', 'Admin\RoleController');
    Route::Resource('user-role', 'Admin\UserRoleController');
    Route::Resource('news', 'Admin\NewsController');
    Route::Resource('comment', 'Admin\CommentController');
    Route::Resource('career', 'Admin\CareerController');
    Route::Resource('team', 'Admin\TeamController');
    Route::Resource('contact', 'Admin\ContactController');


});





Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-us', 'HomeController@about')->name('about');
Route::get('/career', 'HomeController@career')->name('site.career');
Route::get('/team', 'HomeController@team')->name('site.team');
Route::get('/news', 'HomeController@news')->name('site.news');
Route::get('/single-news/{slug}', 'HomeController@singleNews')->name('site.single-news');
Route::get('/contact', 'HomeController@contact')->name('site.contact');



Route::post('/add-comment-news/{news_id}', 'HomeController@addComment')->name('site.add_comment');
Route::post('/send-message', 'Admin\ContactController@store')->name('send-message');
