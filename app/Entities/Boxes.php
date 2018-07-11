<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    
    protected $fillable = [
        'name', 'barcode', 'location', 'size', 'harga'
    ];

}
