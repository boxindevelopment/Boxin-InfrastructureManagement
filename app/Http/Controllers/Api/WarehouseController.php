<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WarehouseResource;
use App\Model\Area;
use App\Model\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        if($warehouses->count() != 0) {
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

    public function byLocation(Request $request)
    {
        $area = Area::search($request->area)->first();
        if($area != null) {
            $warehouses = Warehouse::where('area_id', $area->id)->get();
            if(count($warehouses) != null) {
                $data = WarehouseResource::collection($warehouses);

                return response()->json([
                    'status' => true,
                    'data' => $data
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'message' => 'Data not found'
        ]);
    }
}