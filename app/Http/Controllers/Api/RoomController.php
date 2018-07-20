<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Model\Room;
use App\Model\Space;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        if(count($rooms) != 0) {
            $data = RoomResource::collection($rooms);
            
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
        $space = Space::search($request->space)->first();
        if($space != null) {
            $rooms = Room::where('space_id', $space->id)->get();
            if(count($rooms) != 0) {
                $data = RoomResource::collection($rooms);

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