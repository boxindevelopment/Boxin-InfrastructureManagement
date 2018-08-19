<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Model\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::where('deleted_at', NULL)->get();
        if(count($cities) != 0) {
            $data = CityResource::collection($cities);

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
        $cities = City::search($request->q)->where('deleted_at', NULL)->get();
        if(count($cities) != 0) {
            $data = CityResource::collection($cities);

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