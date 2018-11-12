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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'API'], function () {

    //===== BOX ======//
	
	//List Box All
    // Route::get('box', ['uses' => 'BoxesController@index', 'as' => 'boxes.index']);
    
    //===== END BOX ======//

});

Route::group(['namespace' => 'Api'], function() {
    Route::prefix('city')->group(function() {
        Route::get('', 'CityController@index')->name('api.city');
        Route::get('/all', 'CityController@all')->name('api.city.all');
        Route::post('search', 'CityController@search')->name('api.city.search');
    });

    Route::prefix('area')->group(function() {
        Route::get('', 'AreaController@index')->name('api.area');
        Route::post('search', 'AreaController@search')->name('api.area.search');
        Route::get('{city_id}', 'AreaController@byCityId')->name('api.area.byCityId');
    });    

    Route::prefix('warehouse')->group(function() {
        Route::get('', 'WarehouseController@index')->name('api.warehouse');
        Route::post('location', 'WarehouseController@byLocation')->name('api.warehouse.location');
        Route::get('{area_id}', 'WarehouseController@byAreaId')->name('api.warehouse.byAreaId');
    });

    Route::prefix('space')->group(function() {
        Route::get('', 'SpaceController@index')->name('api.space');
        Route::post('warehouse', 'SpaceController@byWarehouse')->name('api.space.warehouse');
        Route::get('{warehouse_id}', 'SpaceController@byWarehouseId')->name('api.warehouse.byWarehouseId');
    });

    Route::prefix('room')->group(function() {
        Route::get('', 'RoomController@index')->name('api.room');
        Route::post('space', 'RoomController@bySpace')->name('api.room.space');
        Route::get('{space_id}', 'RoomController@bySpaceId')->name('api.room.bySpaceId');
    });

    Route::prefix('box')->group(function() {
        Route::get('', 'BoxController@index')->name('api.box');
        Route::post('space', 'BoxController@bySpace')->name('api.box.space');
        Route::get('{space_id}', 'BoxController@bySpaceId')->name('api.box.bySpaceId');
        Route::get('random', 'BoxController@randomChoice')->name('api.box.random');
    });
});
