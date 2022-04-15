<?php

use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/remove', 'UserController@remove')->name('user.remove');
Route::get('/users/{users}/location', 'UserController@location')->name('user.location');
Route::patch('/users/{user}/approve', 'UserController@approve')->name('user.approve');
Route::get('/schedule/{users}/book', 'ScheduleController@book')->name('schedule.book');
Route::post('/schedule/bookevent', 'ScheduleController@bookevent')->name('schedule.bookevent');
Route::get('/schedule/{booking_type}', 'ScheduleController@index')->name('schedule.index');
Route::patch('/schedule/{schedule}/approve}', 'ScheduleController@approve')->name('schedule.approve');
Route::get('/users/{users}/rate', 'RatingController@rate')->name('user.rate');
Route::post('/users/rate', 'RatingController@saverate')->name('user.saverate');
Route::get('/users/{user_type}/ratings', 'RatingController@index')->name('user.rating');

//Route::middleware('role:admin')->group(function () {
    Route::get('/users/{user_type}', 'UserController@index')->name('users.index');
// /});

Route::middleware(['can:view,user'])->group(function () {
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
