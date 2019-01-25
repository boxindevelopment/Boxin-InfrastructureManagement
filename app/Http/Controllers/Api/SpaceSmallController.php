<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SpaceSmall;
use App\Http\Resources\SpaceSmallResource;
use App\Model\Shelves;
use Illuminate\Http\Request;

class SpaceSmallController extends Controller
{
    public function index()
    {
        $spaceSmall = SpaceSmall::where('deleted_at', NULL)->get();
        if(count($spaceSmall) != 0) {
            $data = SpaceSmallResource::collection($spaceSmall);

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

    public function show($spaceSmall)
    {
        $spaceSmall = SpaceSmall::where('deleted_at', NULL)->find($spaceSmall);
        if($spaceSmall) {
            $data = new SpaceSmallResource($spaceSmall);

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

    public function byAreaId(Request $request)
    {
        $shelves = Shelves::where('area_id', $request->area_id)->where('deleted_at', NULL)->first();
        if($shelves != null) {
            $spaceSmall = SpaceSmall::where('shelves_id', $shelves->id)->get();
            if(count($spaceSmall) != 0) {
                $data = SpaceSmallResource::collection($spaceSmall);

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

    public function byShelvesId($shelves_id)
    {
        $spaceSmall = SpaceSmall::where('shelves_id', $shelves_id)->where('deleted_at', NULL)->get();
        if(count($spaceSmall) != 0) {
            $data = SpaceSmallResource::collection($spaceSmall);

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
