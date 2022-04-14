<?php

use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/remove', 'UserController@remove')->name('user.remove');
Route::get('/users/{users}/location', 'UserController@location')->name('user.location');
Route::patch('/users/{user}/approve', 'UserController@approve')->name('user.approve');
Route::get('/schedule/{users}/book', 'ScheduleController@book')->name('schedule.book');
Route::post('/schedule/bookevent', 'ScheduleController@bookevent')->name('schedule.bookevent');

//Route::middleware('role:admin')->group(function () {
    Route::get('/users/{user_type}', 'UserController@index')->name('users.index');
// /});

Route::middleware(['can:view,user'])->group(function () {
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
