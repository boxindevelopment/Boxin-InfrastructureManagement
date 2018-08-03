<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpaceResource;
use App\Model\Space;
use App\Model\Warehouse;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index()
    {
        $spaces = Space::all();
        if(count($spaces) != 0) {
            $data = SpaceResource::collection($spaces);

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

    public function byWarehouse(Request $request)
    {
        $warehouse = Warehouse::search($request->warehouse)->first();
        if($warehouse != null) {
            $spaces = Space::where('warehouse_id', $warehouse->id)->get();
            if(count($spaces) != null) {
                $data = SpaceResource::collection($spaces);

                return response()->json([
                    'status' => true,
                    'data' => $data
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'date' => 'Data not found'
        ]);
    }

    public function byWarehouseId($warehouse_id)
    {
        $spaces = Space::where('warehouse_id', $warehouse_id)->get();
        if(count($spaces) != 0) {
            $data = SpaceResource::collection($spaces);

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
}