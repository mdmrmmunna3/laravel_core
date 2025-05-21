<?php

namespace App\Livewire;

use App\Models\Video;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;


class Videos extends Component
{
    public $videos, $videoId;
    public function render()
    {
        return view('livewire.videos');
    }

    public function mount()
    {
        $this->videos = Video::all();
    }

    #[On('reloadVideos')]
    public function reloadVideos()
    {
        $this->videos = Video::all();
    }

    public function edit($id)
    {
        $this->dispatch('editVideo', $id);
    }

    public function delete($id)
    {
        // dd($id);
        $this->videoId = $id;
        Flux::modal('delete-video')->show();
    }

    public function destroy_video()
    {
        Video::find($this->videoId)->delete();
        Flux::modal('delete-video')->close();

        $this->dispatch('reloadVideos');
    }
}
