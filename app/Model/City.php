<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name'
    ];

    public function areas()
    {
        return $this->hasMany('App\Model\Area', 'city_id', 'id');
    }
}