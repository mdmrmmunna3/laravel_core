<?php

namespace App\Livewire;

use App\Models\Post;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    public $postId;
    public $search = '';
    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        return view('livewire.posts', ['posts' => $posts]);
    }

    public function mount()
    {
        // $this->posts = Post::all();
    }

    #[On("reloadPosts")]
    public function reloadPosts()
    {
        // $this->posts = Post::all();
        $this->resetPage();
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
