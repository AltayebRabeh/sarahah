<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => \App\Http\Middleware\Localization::class], function () {
    Auth::routes(['verify' => true]);

    Auth::routes();

    Route::group(['middleware' => 'verified'], function () {

        Route::get('/', 'MessagesController@messages')->name('messages');

        Route::get('/messages', 'MessagesController@messages')->name('messages');

        Route::get('/{username}', 'MessagesController@getSendMessageForm')->name('get.send.message');
        Route::post('/{username}', 'MessagesController@sendMessage')->name('send.message');

        Route::post('/upload_image/{id}', 'UsersController@uploadPhoto')->name('upload_photo');
    });

});
Route::get('/greeting/{locale}', 'LocalizationController@index')->name('change.lang');
