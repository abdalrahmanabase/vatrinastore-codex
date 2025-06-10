<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryIndex extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::latest()->get();
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $this->categories = Category::latest()->get(); // Refresh list
        session()->flash('message', 'Category deleted successfully.');
    }

    public function render()
    {
        return view('livewire.category.categoryindex');
    }
}
