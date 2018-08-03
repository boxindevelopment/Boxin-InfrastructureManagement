<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'space_id', 'name'
    ];

    public function space()
    {
        return $this->belongsTo('App\Model\Space', 'space_id', 'id');
    }
}