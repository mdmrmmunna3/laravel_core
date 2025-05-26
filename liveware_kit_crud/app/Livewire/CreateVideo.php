<?php

namespace App\Livewire;

use App\Models\Video;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;
    public $title, $description, $videoImage;
    public function render()
    {
        return view('livewire.create-video');
    }

    public function submit_video()
    {
        // dd($this->title);
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'videoImage' => 'nullable|image|max:2048'
        ]);

        $videoImagePath = null;
        if ($this->videoImage) {
            $videoImagePath = $this->videoImage->store('videos_image', 'public');
        }

        Video::create([
            'title' => $this->title,
            'description' => $this->description,
            'videoImage' => $videoImagePath
        ]);

        // $this->resetVideo();
        Flux::modal('create-video')->close();
        $this->dispatch("reloadVideos");
    }

    // public function resetVideo()
    // {
    //     $this->reset(['title', 'description', 'videoImage']);
    // }
}
