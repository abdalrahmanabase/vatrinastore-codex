<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class ProductEdit extends Component
{
    public $productId;
    public $title;
    public $description;
    public $price;
    public $category_id;
    public $sub_category_id;

    public $categories = [];
    public $subCategories = [];

    public function mount($product)
    {
        $this->productId = $product;
        $prod = Product::findOrFail($product);
        $this->title = $prod->title;
        $this->description = $prod->description;
        $this->price = $prod->price;
        $this->category_id = $prod->category_id;
        $this->sub_category_id = $prod->sub_category_id;

        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
        ]);

        $prod = Product::findOrFail($this->productId);
        $prod->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
        ]);

        session()->flash('message', 'Product updated successfully.');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product.product-edit');
    }
}
