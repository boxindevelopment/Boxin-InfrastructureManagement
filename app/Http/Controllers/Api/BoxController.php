<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Box;
use App\Http\Resources\BoxResource;
use App\Model\Space;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $box = Box::where('deleted_at', NULL)->get();
        if(count($box) != 0) {
            $data = BoxResource::collection($box);

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

    public function bySpace(Request $request)
    {
        $space = Space::search($request->space)->where('deleted_at', NULL)->first();
        if($space != null) {
            $box = Box::where('space_id', $space->id)->get();
            if(count($box) != 0) {
                $data = BoxResource::collection($box);

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

    public function bySpaceId($space_id)
    {
        $box = Box::where('space_id', $space_id)->where('deleted_at', NULL)->get();
        if(count($box) != 0) {
            $data = BoxResource::collection($box);

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

    public function byShelvesId($shelves_id)
    {
        $box = Box::where('shelves_id', $shelves_id)->where('deleted_at', NULL)->get();
        if(count($box) != 0) {
            $data = BoxResource::collection($box);

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

    public function randomChoice()
    {
        $box = Box::where('deleted_at', NULL)->get();
        if(count($box) != 0) {
            $random = array_random($box->toArray(), 1);

            return response()->json([
                'status' => true,
                'data' => $random[0]
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data not found'
        ]);
    }
}
