<?php

namespace App\Livewire;

use App\Models\Post;
use Flux\Flux;
use Livewire\Component;

class PostCreate extends Component
{
    public $title, $describ;
    public $successMessage = '';
    public function render()
    {
        return view('livewire.post-create');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'describ' => 'required'
        ]);

        // dd($this->title);

        Post::create([
            'title' => $this->title,
            'describ' => $this->describ
        ]);

        $this->clearPostForm();
        Flux::modal('create-post')->close();

        $this->successMessage = 'Post Created Successfully';
        // create event 
        $this->dispatch("reloadPosts");
    }

    public function clearPostForm()
    {
        $this->title = '';
        $this->describ = '';
    }
}
