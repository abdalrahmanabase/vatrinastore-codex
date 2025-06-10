<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryCreate extends Component
{
    public $name;

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('message', 'Category created successfully.');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.category-create');
    }
}
