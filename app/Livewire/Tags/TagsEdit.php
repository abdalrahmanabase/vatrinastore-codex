<?php

namespace App\Livewire\Tags;

use Livewire\Component;
use App\Models\Tag; 
use Illuminate\Support\Str;

class TagsEdit extends Component
{
    public $tag;
    public $name;
    public $id;

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
        $this->name = $tag->name;
        $this->id = $tag->id;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|unique:tags,name,' . $this->id,
        ]);

        $this->tag->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('message', 'Tag updated successfully.');
        return redirect()->route('tags.index');
    }
    public function render()
    {
        return view('livewire.tags.tags-edit');
    }
}
