<?php

namespace App\Livewire;

use App\Models\Article;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
class Articles extends Component
{
    public $articles, $user_id, $articleId;
    public function render()
    {
        return view('livewire.articles');
    }

    public function mount()
    {
        $this->articles = Article::with('user')->where('user_id', Auth::id())->get();
    }

    #[On('reloadArticles')]
    public function reloadArticles()
    {
        $this->articles = Article::with('user')->where('user_id', Auth::id())->get();
    }

    public function edit($id)
    {
        $this->dispatch('editArticle', $id);
    }

    public function delete($id)
    {
        // $article = Article::find($id);
        $this->articleId = $id;
        // dd($id);
        Flux::modal('delete-article')->show();
    }

    public function destroy_article()
    {
        Article::find($this->articleId)->delete();
        Flux::modal('delete-article')->close();
        $this->dispatch('reloadArticles');
    }
}
