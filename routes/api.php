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

	//===== WAREHOUSE ======//
	
	//List City Warehouse
    Route::get('citywarehouse', ['uses' => 'WarehouseController@cityWarehouse', 'as' => 'warehouse.cityWarehouse']);
    //List Area by City Warehouse
    Route::get('area/{city_warehouse_id}', ['uses' => 'WarehouseController@areaBycityWarehouse', 'as' => 'warehouse.areaBycityWarehouse']);
    //List Warehouse by Area
    Route::get('warehouse/area/{area_id}', ['uses' => 'WarehouseController@warehouseByArea', 'as' => 'warehouse.warehouseByArea']);
    //List Warehouse All
    Route::get('warehouse', ['uses' => 'WarehouseController@index', 'as' => 'warehouse.index']);
    //Warehouse by ID
    Route::get('warehouse/{id}', ['uses' => 'WarehouseController@show', 'as' => 'warehouse.show']);
    
    //===== END WAREHOUSE ======//

    //===== SPACE ======//
	
	//List space by warehouse ID
    Route::get('space/warehouse/{warehouse_id}', ['uses' => 'SpaceController@spaceByWarehouse', 'as' => 'space.spaceByWarehouse']);
    //List Space All
    Route::get('space', ['uses' => 'SpaceController@index', 'as' => 'space.index']);
    //Space by ID
    Route::get('space/{id}', ['uses' => 'SpaceController@show', 'as' => 'space.show']);
    
    //===== END SPACE ======//

    //===== ROOM ======//
	
	//List room by space ID
    Route::get('room/space/{space_id}', ['uses' => 'RoomController@roomBySpace', 'as' => 'space.roomBySpace']);
    //List Room All
    Route::get('room', ['uses' => 'RoomController@index', 'as' => 'room.index']);
    //Room by ID
    Route::get('room/{id}', ['uses' => 'RoomController@show', 'as' => 'room.show']);
    
    //===== END ROOM ======//

    //===== BOX ======//
	
	//List Box All
    Route::get('box', ['uses' => 'BoxesController@index', 'as' => 'boxes.index']);
    
    //===== END BOX ======//

});


