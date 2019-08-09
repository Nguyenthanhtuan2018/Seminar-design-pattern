<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Public
 */
Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'user'], function(){
        Route::post('register-user-account', 'UsersController@store')->name('user.store');
        Route::post('login', 'UsersController@login')->name('user.login');
    });
});

/*
 * User
 */
Route::group(['middleware' => 'auth:api', 'prefix' => 'v1'], function() {
    Route::group(['prefix' => 'user'], function(){
        Route::get('get-list-user', 'UsersController@index')->name('user.index');
        Route::get('get-detail-user/{id}', 'UsersController@show')->name('user.show');
        Route::post('logout', 'UsersController@logout')->name('user.logout');
    });
});
