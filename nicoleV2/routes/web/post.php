<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::get('/posts', 'PostController@index')->name('post.index');
Route::post('/posts', 'PostController@store')->name('post.store');

Route::delete('/posts/{post}/remove', 'PostController@remove')->name('post.remove');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/posts/{post}/update', 'PostController@update')->name('post.update');
Route::get('/post/{post}', 'PostController@show')->name('post');
