<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class AreaWarehouse extends Model
{
    
    protected $fillable = [
        'city_warehouse_id', 'name'
    ];

    public function cityWarehouse()
    {
        return $this->belongsTo('App\Entities\CityWarehouse', 'city_warehouse_id');
    }

}
