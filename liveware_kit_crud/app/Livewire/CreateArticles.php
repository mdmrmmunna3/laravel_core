<?php

namespace App\Livewire;

use App\Models\Article;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticles extends Component
{

    public $title, $content, $user_id;
    public function render()
    {
        return view('livewire.create-articles');
    }

    public function mount()
    {
        $this->user_id = Auth::id();
    }
    public function create_articles()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required'
        ]);

        // dd($this->content);

        Article::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $this->user_id
        ]);

        $this->resetArticleForm();
        Flux::modal('create-articles')->close();
        $this->dispatch('reloadArticles');
    }

    public function resetArticleForm()
    {
        $this->title = "";
        $this->content = "";
    }
}
