<?php

namespace App\Livewire;

use App\Models\Video;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;


class EditVideo extends Component
{
    public $title, $description, $vidoeId;
    public function render()
    {
        return view('livewire.edit-video');
    }

    #[On('editVideo')]

    public function editVideo($id)
    {
        $video = Video::find($id);
        $this->vidoeId = $id;
        $this->title = $video->title;
        $this->description = $video->description;

        Flux::modal('edit-video')->show();

    }

    public function update_video()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $video = Video::find($this->vidoeId);
        $video->title = $this->title;
        $video->description = $this->description;

        $video->save();
        $this->dispatch('reloadVideos');
        Flux::modal('edit-video')->close();
    }
}
