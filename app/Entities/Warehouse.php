<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    
    protected $fillable = [
        'area_id', 'name', 'lat', 'long'
    ];

    public function areaWarehouse()
    {
        return $this->belongsTo('App\Entities\areaWarehouse', 'area_id');
    }

}
