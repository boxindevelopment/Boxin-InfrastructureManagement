<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Model\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        if(count($areas) != 0) {
            $data = AreaResource::collection($areas);

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

    public function search(Request $request)
    {
        $areas = Area::search($request->q)->get();
        if(count($areas) != 0) {
            $data = AreaResource::collection($areas);

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

    public function byCityId($city_id)
    {

        $areas = Area::where('city_id', $city_id)->get();
        if(count($areas) != 0) {
            $data = AreaResource::collection($areas);

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