<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Room;

class RoomController extends Controller
{
    public function index()
    {
        return Room::with('space')->get();
    }
 
    public function show($id)
    {
        $check = Room::where('id',$id)->count();
        if($check == 1){
            return Room::find($id);
        }
        else{
            return response()->json($response = ['message' => 'space not found']);
        }
    }

    public function roomBySpace($space_id)
    {
        $check = Room::where('space_id', $space_id)->count();

        if($check > 0){
            return Room::where('space_id', $space_id)->get();
        }else{
            return response()->json($response = ['message' => 'room not found']);
        }
    }
    
}

?>

