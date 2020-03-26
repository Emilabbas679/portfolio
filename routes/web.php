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


});





Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
