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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('', 'Auth\LoginController@logout')->name('home.logout');
Route::prefix('/admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('', 'AdminController@index')->name('admin.dashboard');  
    Route::prefix('/user')->group(function(){
        Route::get('/add-user', 'AdminController@getAddUser')->name('admin.add.user');
        Route::post('/add-user', 'AdminController@postAddUser')->name('admin.post.add.user');
        Route::get('/edit-user/{id}', 'AdminController@getEditUser')->name('admin.edit.user');
        Route::post('/edit-user/{id}', 'AdminController@postEditUser')->name('admin.post.edit.user');
        Route::post('/delete-user', 'AdminController@deleteUser')->name('admin.delete.user');
    });
});

