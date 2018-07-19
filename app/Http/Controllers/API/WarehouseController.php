<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Entities\Warehouse;
use App\Entities\CityWarehouse;
use App\Entities\AreaWarehouse;
use App\Http\Resources\CityWarehouseResource;
use App\Http\Resources\WarehouseResource;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        if(count($warehouses) != 0) {
            $data = WarehouseResource::collection($warehouses);

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data not found'
        ]);
    }
 
    public function show($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        if(count($warehouse) != 0) {
            $data = new WarehouseResource($warehouse);

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data not found'
        ]);
    }

    public function cityWarehouse()
    {
        $cities = CityWarehouse::all();
        if(count($cities) != 0) {
            $data = CityWarehouseResource::collection($cities);

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data not found'
        ]);
    }

    public function areaBycityWarehouse($city_warehouse_id)
    {
        return AreaWarehouse::with('cityWarehouse')
            ->where('city_warehouse_id', $city_warehouse_id)
            ->get();
    }

    public function warehouseByArea($area_id)
    {
        return Warehouse::where('area_id', $area_id)->get();
    }
    
}

?>

