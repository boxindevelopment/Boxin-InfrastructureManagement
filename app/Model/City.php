<?php

namespace App\Model;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Searchable;

    protected $table = 'cities';

    protected $fillable = [
        'name'
    ];

    protected $searchable = ['id', 'name'];

    public function areas()
    {
        return $this->hasMany('App\Model\Area', 'city_id', 'id');
    }
}