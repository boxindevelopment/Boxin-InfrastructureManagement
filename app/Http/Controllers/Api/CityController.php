<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Model\City;
use Illuminate\Http\Request;
use App\Http\Resources\AreaResource;
use App\Model\Area;

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

    public function all()
    {
        $cities = City::where('deleted_at', NULL)->get();
        $data = array();
        if(count($cities) != 0) {
            foreach($cities as $key => $value){
            
                $areas = Area::where('city_id', $value['id'])->where('deleted_at', NULL)->get();
                $data[$key]['city_id']      = $value['id'];
                $data[$key]['city_name']    = $value['name'];
                $area = array();
                foreach($areas as $k => $v){
                    $area[$k]['area_id']    = $v['id'];
                    $area[$k]['area_name']  = $v['name'];
                }
                $data[$key]['area']         = $area;
            }

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