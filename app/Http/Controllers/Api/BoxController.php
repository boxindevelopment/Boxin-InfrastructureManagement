<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Box;

class BoxController extends Controller
{
    public function randomChoice()
    {
        $box = Box::all();
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