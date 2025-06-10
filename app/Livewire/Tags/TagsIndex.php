<?php

namespace App\Livewire\Tags;

use Livewire\Component;
use App\Models\Tag; 

class TagsIndex extends Component
{
    public $tags;

    public function mount(){
        $this->tags = Tag::latest()->get();
    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        $this->tags = Tag::latest()->get(); 

        session()->flash('message', 'Tag deleted successfully.');
    }

    public function render()
    {
        return view('livewire.tags.tags-index');
    }
}
