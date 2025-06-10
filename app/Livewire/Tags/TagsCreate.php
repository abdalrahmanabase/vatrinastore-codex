<?php

namespace App\Livewire\Tags;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Str;


class TagsCreate extends Component
{
    public $name;

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:tags,name',
        ]);

        Tag::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('message', 'Tag created successfully.');
        return redirect()->route('tags.index');
    }
    public function render()
    {
        return view('livewire.tags.tags-create');
    }
}
