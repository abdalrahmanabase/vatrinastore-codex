<?php

namespace App\Livewire\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryindex extends Component
{
    public $subCategories;
    
    public function mount(){
        $this->subCategories = SubCategory::with('category')->latest()->get();
    }

    public function delete($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        $this->subCategories = SubCategory::with('category')->latest()->get(); // Refresh list
        session()->flash('message', 'Sub-category deleted successfully.');
    }
    public function render()
    {
        return view('livewire.sub-category.sub-categoryindex');
    }
}
