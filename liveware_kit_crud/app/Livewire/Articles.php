<?php

namespace App\Livewire;

use App\Models\Article;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
class Articles extends Component
{
    use WithPagination;
    public $user_id, $articleId;

    public function render()
    {
        // $articles = Article::orderBy('id', 'DESC')->latest()->paginate(5);
        $articles = Article::with('user')->where('user_id', Auth::id())->latest()->paginate(5);

        return view('livewire.articles', ['articles' => $articles]);
    }

    public function mount()
    {
        // $this->articles = Article::with('user')->where('user_id', Auth::id())->get();
    }

    #[On('reloadArticles')]
    public function reloadArticles()
    {
        // $this->articles = Article::with('user')->where('user_id', Auth::id())->get();
        $this->resetPage();
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
