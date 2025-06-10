<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class ProductShow extends Component
{
    public Product $product;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.product.product-show');
    }
}
