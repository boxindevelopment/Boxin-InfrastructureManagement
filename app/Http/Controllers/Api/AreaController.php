<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Model\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        if(count($areas)) {
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