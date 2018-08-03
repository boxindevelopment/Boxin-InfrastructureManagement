<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $table = 'boxes';

    protected $fillable = [
        'space_id', 'name', 'barcode', 'location', 'size', 'price'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function space()
    {
        return $this->belongsTo('App\Model\Space', 'space_id', 'id');
    }
}