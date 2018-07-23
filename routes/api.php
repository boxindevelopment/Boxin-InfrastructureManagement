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

Route::group(['namespace' => 'Api'], function() {
    Route::prefix('area')->group(function() {
        Route::get('', 'AreaController@index')->name('api.area');
        Route::post('search', 'AreaController@search')->name('api.area.search');
    });

    Route::prefix('city')->group(function() {
        Route::get('', 'CityController@index')->name('api.city');
        Route::post('search', 'CityController@search')->name('api.city.search');
    });

    Route::prefix('warehouse')->group(function() {
        Route::get('', 'WarehouseController@index')->name('api.warehouse');
        Route::post('location', 'WarehouseController@byLocation')->name('api.warehouse.location');
    });

    Route::prefix('space')->group(function() {
        Route::get('', 'SpaceController@index')->name('api.space');
        Route::post('warehouse', 'SpaceController@byWarehouse')->name('api.space.warehouse');
    });

    Route::prefix('room')->group(function() {
        Route::get('', 'RoomController@index')->name('api.room');
        Route::post('space', 'RoomController@bySpace')->name('api.room.space');
    });

    Route::prefix('box')->group(function() {
        Route::get('random', 'BoxController@randomChoice')->name('api.box.random');
    });
});
