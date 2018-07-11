<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Warehouse;
use App\Entities\CityWarehouse;
use App\Entities\AreaWarehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return Warehouse::with('areaWarehouse')->get();
    }
 
    public function show($id)
    {
        return Warehouse::find($id);
    }

    public function cityWarehouse()
    {
        return CityWarehouse::all();
    }

    public function areaBycityWarehouse($city_warehouse_id)
    {
        return AreaWarehouse::with('cityWarehouse')
            ->where('city_warehouse_id', $city_warehouse_id)
            ->get();
    }

    public function warehouseByArea($area_id)
    {
        return Warehouse::where('area_id', $area_id)->get();
    }
    
}

?>

