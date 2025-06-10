<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
    ];

    public function products()
{
    return $this->belongsToMany(Product::class, 'product_size')
        ->using(ProductSize::class)
        ->withPivot('stock')
        ->withTimestamps();
}

protected static function booted()
    {
        static::creating(function ($size) {
            if (empty($size->label)) {
                throw new \Exception('The label field is required.');
            }
        });
    }
}