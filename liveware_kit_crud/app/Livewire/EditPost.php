<?php

namespace App\Livewire;

use App\Models\Post;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;


class EditPost extends Component
{
    public $title, $describ, $postId;
    public function render()
    {
        return view('livewire.edit-post');
    }

    #[On("editPost")]
    public function editPost($id)
    {
        $post = Post::find($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->describ = $post->describ;

        Flux::modal('edit-post')->show();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'describ' => 'required'
        ]);

        $post = Post::find($this->postId);
        $post->title = $this->title;
        $post->describ = $this->describ;

        $post->save();

        Flux::modal('edit-post')->close();
        $this->dispatch('reloadPosts');
    }
}
