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
        $spaces = Space::where('deleted_at', NULL)->get();
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

    public function byAreaId($area_id)
    {
        $spaces = Space::where('area_id', $area_id)->where('deleted_at', NULL)->get();
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