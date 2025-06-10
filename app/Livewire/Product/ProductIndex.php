<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class ProductIndex extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::with(['category', 'subCategory'])->latest()->get();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $this->products = Product::with(['category', 'subCategory'])->latest()->get();
        session()->flash('message', 'Product deleted successfully.');
    }

    public function render()
    {
        return view('livewire.product.product-index');
    }
}
