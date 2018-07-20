<?php

namespace App\Model;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use Searchable;

    protected $table = 'areas';

    protected $fillable = [
        'city_id', 'name'
    ];

    protected $searchable = ['id', 'name', 'city' => ['id', 'name']];

    public function city()
    {
        return $this->belongsTo('App\Model\City', 'city_id', 'id');
    }

    public function warehouses()
    {
        return $this->hasMany('App\Model\Warehouse', 'area_id', 'id');
    }
}