<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SurveyController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/surveys', [SurveyController::class, 'index']);
Route::post('/surveys', [SurveyController::class, 'store']);

//route resource
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('groups', App\Http\Controllers\GroupController::class);
    Route::resource('members', App\Http\Controllers\MemberController::class);
    Route::resource('schedules', App\Http\Controllers\ScheduleController::class);
    Route::resource('presences', App\Http\Controllers\PresenceController::class);

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('app');
});

Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');

