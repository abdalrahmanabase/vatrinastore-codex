<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryEdit extends Component
{
    public $categoryId;
    public $name;

    public function mount($category)
    {
        $this->categoryId = $category;
        $cat = Category::findOrFail($category);
        $this->name = $cat->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:categories,name,' . $this->categoryId,
        ]);

        $cat = Category::findOrFail($this->categoryId);
        $cat->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('message', 'Category updated successfully.');
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category.categoryedit');
    }
}
