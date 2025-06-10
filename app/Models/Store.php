<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
        'location_details',
        'phone',
        'second_phone',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}