<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id',
        'image',
        'order',
    ];
    protected $appends = ['image'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;
        
        return Storage::disk('public')->exists($this->image)
            ? Storage::disk('public')->url($this->image)
            : null;
    }
}