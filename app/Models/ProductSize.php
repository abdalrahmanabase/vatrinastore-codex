<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductSize extends Pivot
{
    protected $fillable = [
        'product_id',
        'size_id',
        'stock',
    ];
    public $timestamps = true;
}
