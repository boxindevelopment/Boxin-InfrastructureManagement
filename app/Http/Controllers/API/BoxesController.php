<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Boxes;

class BoxesController extends Controller
{
    public function index()
    {
        return Boxes::all();
    }
 
    public function show($id)
    {
        $check = Boxes::where('id',$id)->count();
        if($check == 1){
            return Boxes::find($id);
        }
        else{
            return response()->json($response = ['message' => 'box not found']);
        }
    }

}

?>

