<?php

namespace App\Livewire\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryedit extends Component
{
    public $subCategory;
    public $name;
    public $category_id;

    public function mount(SubCategory $subCategory)
    {
        $this->subCategory = $subCategory;
        $this->name = $subCategory->name;
        $this->category_id = $subCategory->category_id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:sub_categories,name,' . $this->subCategory->id,
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->subCategory->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Sub-category updated successfully.');
        return redirect()->route('subcategories.index');
    }

    public function render()
    {
        return view('livewire.sub-category.sub-categoryedit', [
            'categories' => Category::all(),
        ]);
    }
}
