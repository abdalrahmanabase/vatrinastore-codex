<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class ProductCreate extends Component
{
    public $title;
    public $description;
    public $price;
    public $category_id;
    public $sub_category_id;

    public $categories = [];
    public $subCategories = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
        ]);

        Product::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'sub_category_id' => $this->sub_category_id,
        ]);

        session()->flash('message', 'Product created successfully.');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product.product-create');
    }
}
