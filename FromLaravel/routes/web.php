<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard/form', 'DashboardController@sreach');

Route::resource('dashboard', 'DashboardController');

Route::prefix('my')->group(function () {
    Route::resource('myforms', 'FormController');
});

Route::get('/demo', function () {
    return view('forms.demo');
});

Route::post('/{id}', 'FormController@getRequestForm');