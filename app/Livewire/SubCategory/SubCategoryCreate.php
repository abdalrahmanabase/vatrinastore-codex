<?php

namespace App\Livewire\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;


class SubCategorycreate extends Component
{
    public $name;
    public $category_id;
    

    public function save(){
        $this->validate([
            'name' => 'required|unique:sub_categories,name',
            'category_id' => 'required|exists:categories,id',
        ]);

        SubCategory::create([
            'name' => $this->name,
            'slug' => \Str::slug($this->name),
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Sub Category created successfully.');
        return redirect()->route('subcategories.index');
    }
    
    public function render()
    {
        return view('livewire.sub-category.sub-categorycreate',[
            'categories' => Category::all(),
        ]);
        
    }
}
