<?php

namespace App\Model;

use App\Core\Model\Searchable;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use Searchable;

    protected $table = 'spaces';

    protected $searchable = ['id', 'name'];

    protected $fillable = [
        'area_id', 'name', 'lat', 'long', 'id_name', 'types_of_size_id'
    ];

    public function area()
    {
        return $this->belongsTo('App\Model\Area', 'area_id', 'id');
    }

    public function type_size()
    {
        return $this->belongsTo('App\Model\TypeSize', 'types_of_size_id', 'id');
    }
}