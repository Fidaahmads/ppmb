<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//route resource
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('/students', App\Http\Controllers\StudentController::class);
    });

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('/posts', App\Http\Controllers\PostController::class);
    });

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('/groups', App\Http\Controllers\GroupController::class);
    });

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('/schedules', \App\Http\Controllers\ScheduleController::class);
    });

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('/members', \App\Http\Controllers\MemberController::class);
    });

Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('/schedules', \App\Http\Controllers\ScheduleController::class);
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');