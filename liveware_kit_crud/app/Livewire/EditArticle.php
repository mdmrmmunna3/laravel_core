<?php

namespace App\Livewire;

use App\Models\Article;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;


class EditArticle extends Component
{
    public $title, $content, $articleId;
    public function render()
    {
        return view('livewire.edit-article');
    }

    #[On('editArticle')]

    public function editArticle($id)
    {
        $article = Article::find($id);
        $this->articleId = $id;
        $this->title = $article->title;
        $this->content = $article->content;
        Flux::modal('edit-articles')->show();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = Article::find($this->articleId);
        $article->title = $this->title;
        $article->content = $this->content;

        $article->save();
        Flux::modal('edit-articles')->close();
        $this->dispatch('reloadArticles');
    }
}
