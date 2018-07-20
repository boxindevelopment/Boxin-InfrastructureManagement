<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $table = 'boxes';

    protected $fillable = [
        'name', 'barcode', 'location', 'size', 'price'
    ];
}