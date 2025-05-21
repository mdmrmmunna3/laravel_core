<?php

namespace App\Livewire;

use App\Models\Video;
use Flux\Flux;
use Livewire\Component;

class CreateVideo extends Component
{
    public $title, $description;
    public function render()
    {
        return view('livewire.create-video');
    }

    public function submit_video()
    {
        // dd($this->title);
        $this->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Video::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        Flux::modal('create-video')->close();
        $this->resetVideo();
        $this->dispatch("reloadVideos");
    }

    public function resetVideo()
    {
        $this->title = "";
        $this->description = "";
    }
}
