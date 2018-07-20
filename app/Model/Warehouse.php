<?php

namespace App\Model;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use Searchable;

    protected $table = 'warehouses';

    protected $fillable = [
        'area_id', 'name', 'lat', 'long'
    ];

    protected $searchable = ['id', 'name'];

    public function area()
    {
        return $this->belongsTo('App\Model\Area', 'area_id', 'id');
    }

    public function spaces()
    {
        return $this->hasMany('App\Model\Space', 'warehouse_id', 'id');
    }
}