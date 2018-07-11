<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Space;

class SpaceController extends Controller
{
    public function index()
    {
        return Space::with('warehouse')->get();
    }
 
    public function show($id)
    {
        $check = Space::where('id',$id)->count();
        if($check == 1){
            return Space::find($id);
        }
        else{
            return response()->json($response = ['message' => 'space not found']);
        }
    }

    public function spaceByWarehouse($warehouse_id)
    {
        $check = Space::where('warehouse_id', $warehouse_id)->count();

        if($check > 0){
            return Space::where('warehouse_id', $warehouse_id)->get();
        }else{
            return response()->json($response = ['message' => 'space not found']);
        }
    }
    
}

?>

