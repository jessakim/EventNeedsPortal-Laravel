<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/admin', 'AdminController@index')->name('admin.index');

    //Route::get('admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');


    //Route::get('admin/users', 'UserController@index')->name('users.index');

});

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    //Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::get('create/{user}', 'MessagesController@create')->name('messages.create');
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});


