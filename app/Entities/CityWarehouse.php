<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CityWarehouse extends Model
{
    
    protected $fillable = [
        'name'
    ];

    public function areaWarehouse()
    {
        return $this->hasMany('App\Entities\AreaWarehouse', 'city_warehouse_id');
    }

}
