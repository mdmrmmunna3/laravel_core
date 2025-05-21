<?php

namespace App\Livewire;

use App\Models\Post;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Posts extends Component
{
    public $posts, $postId;
    public function render()
    {
        return view('livewire.posts');
    }

    public function mount()
    {
        $this->posts = Post::all();
    }

    #[On("reloadPosts")]
    public function reloadPosts()
    {
        $this->posts = Post::all();
    }

    public function edit($id)
    {
        $this->dispatch("editPost", $id);
    }

    public function delete($id)
    {
        // dd('deletePost', $id);
        $this->postId = $id;
        Flux::modal('delete-post')->show();
    }

    public function destroy()
    {
        Post::find($this->postId)->delete();
        Flux::modal('delete-post')->close();
        $this->reloadPosts();
    }
}
